<?php

// src/Service/Scrapers/BlogScraper.php
namespace App\Service\Scrapers;

use Symfony\Component\HttpClient\HttpClient;

class BlogScraper extends BaseScraper
{
    public function scrapeBlogPosts(string $url): array
    {
        $crawler = $this->client->request('GET', $url);
        $data = $crawler->filter('article')->each(function ($node) {
            return [
                'title' => $node->filter('h2')->text(),
                'link' => $node->filter('a')->attr('href'),
                'summary' => $node->filter('p')->text(),
            ];
        });

        return $data;
    }
}
