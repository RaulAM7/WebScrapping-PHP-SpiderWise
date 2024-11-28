<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\Scrapers\BlogScraper;


class ScrapingController extends AbstractController
{

    private BlogScraper $blogScraper;

    public function __construc(BlogScraper $blogScraper)
    {
        $this->blogScraper = $blogScraper; 
    }

    #[Route('/scrape-blog', name: 'scrape_blog')]
    public function index(): Response
    {

        $data_extracted = $this->blogScraper->scrapeBlogPosts('https://techcrunch.com/');

        return $this->render('scraping/index.html.twig', [
            'controller_name' => 'ScrapingController',
        ]);
    }
}
