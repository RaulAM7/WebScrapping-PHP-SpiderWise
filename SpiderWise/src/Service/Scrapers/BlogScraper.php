<?php
// src/Service/Scrapers/BlogScraper.php
namespace App\Service\Scrapers;

use Symfony\Component\HttpClient\HttpClient;

class BlogScraper extends BaseScraper
{
    public function scrapeBlogPosts(string $url): array
    {
        $crawler = $this->client->request('GET', $url);
        $data = $crawler->filter('article')
                        ->each(function ($node) 
        {
            return [
                'title' => $node->filter('h2')->text(),
                'link' => $node->filter('a')->attr('href'),
                'summary' => $node->filter('p')->text(),
            ];
        });

        return $data;
    }

    public function scrapeCompanies(string $url): array
    {
        $crawler = $this->client->request('GET', $url);
        $data = $crawler->filter('.company-list')->each(function ($node) {
            return [
                'html' => $node->outerHtml(),
                'name' => $node->filter('a.b')->text(''),
                'link' => $node->filter('a.b')->attr('href'),
                'category' => $node->filter('p')->text(''),
            ];
        });

        return $data;
    }

    public function scrapeMultiplePagesCompanies(string $baseUrl, int $start, int $end): array
    {
        $allData = [];

        
        for ($i = $start; $i <= $end; $i++) {
            // Generar la URL para cada página
            $url = $i === 1 ? $baseUrl : $baseUrl . $i . '/';

    
            $crawler = $this->client->request('GET', $url);

            
            $data = $crawler->filter('.company-list')->each(function ($node) {
                return [
                    'html' => $node->outerHtml(), // Contenido completo del div
                    'name' => $node->filter('h2 a')->text(''), // Nombre de la empresa
                    'link' => $node->filter('h2 a')->attr('href'), // Enlace a la empresa
                    'category' => $node->filter('p')->text(''), // Categoría o descripción
                    'view_link' => $node->filter('a.b')->attr('href') ?? '', // Enlace "Ver empresa" si está disponible
                ];
            });

            // Agregar los datos de esta página al array general
            $allData = array_merge($allData, $data);
        }

        return $allData;
    }
}

