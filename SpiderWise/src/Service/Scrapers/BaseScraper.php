<?php
// src/Service/Scrapers/BaseScraper.php

namespace App\Service\Scrapers;

use Symfony\Component\BrowserKit\HttpBrowser;

class BaseScraper
{
    protected HttpBrowser $client;

    public function __construct()
    {
        $this->client = new HttpBrowser();
    }
}