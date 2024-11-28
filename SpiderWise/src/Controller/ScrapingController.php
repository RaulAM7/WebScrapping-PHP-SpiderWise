<?php

namespace App\Controller;

set_time_limit(300);

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\Scrapers\BlogScraper;


class ScrapingController extends AbstractController
{
    private BlogScraper $blogScraper;

    public function __construct(BlogScraper $blogScraper)
    {
        $this->blogScraper = $blogScraper;
    }

    #[Route('/scrape-blog', name: 'scrape_blog')]
    public function index(): Response
    {

        $blog_post_scraped = $this->blogScraper->scrapeBlogPosts('https://www.apte.org/empresas');

        dd($blog_post_scraped);

        return $this->render('scraping/blog-scraping.html.twig', [
            'controller_name' => 'ScrapingController',
            'posts' => $blog_post_scraped,
        ]);
    }

    #[Route('/scrape-companies', name: 'scrape_companies')]
    public function allCompanies(): Response
    {

        $companies_scraped = $this->blogScraper->scrapeMultiplePagesCompanies(
            'https://www.apte.org/empresas/',
            1,
            3
        );


        dd($companies_scraped);

        return $this->render('scraping/companies-all.html.twig', [
            'controller_name' => 'ScrapingController',
            'companies' => $companies_scraped,
        ]);
    }
}
