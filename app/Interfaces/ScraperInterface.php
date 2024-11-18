<?php

namespace App\Interfaces;

interface ScraperInterface
{
    public function scrape(string $url): \Symfony\Component\DomCrawler\Crawler;
    public function extractProductData(\Symfony\Component\DomCrawler\Crawler $crawler): array;
}

interface ProductPersisterInterface
{
    public function saveProduct(array $data): \App\Models\Product;
}
