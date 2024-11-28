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

        $blog_post_scraped = $this->blogScraper->scrapeBlogPosts('https://techcrunch.com/');

        return $this->render('scraping/blog-scraping.html.twig', [
            'controller_name' => 'ScrapingController',
            'posts' => $blog_post_scraped,
        ]);
    }
}
