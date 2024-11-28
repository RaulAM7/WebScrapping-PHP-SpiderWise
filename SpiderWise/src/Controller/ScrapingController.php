<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScrapingController extends AbstractController
{
    #[Route('/scraping', name: 'app_scraping')]
    public function index(): Response
    {
        return $this->render('scraping/index.html.twig', [
            'controller_name' => 'ScrapingController',
        ]);
    }
}
