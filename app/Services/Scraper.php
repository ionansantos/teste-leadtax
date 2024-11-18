<?php
namespace App\Services;

use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Client;

class Scraper
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function scrape(string $url): Crawler
    {
        $response = $this->client->get($url);
        $html = $response->getBody()->getContents();
        return new Crawler($html);
    }

    public function extractProductData(Crawler $node): array
    {
        $productUrl = $node->filter('a.poly-component__title')->attr('href');
        $productHtml = file_get_contents($productUrl);
        $crawler =  new Crawler($productHtml);

        return [
            'name' => $crawler->filter('h1.ui-pdp-title')->text() ?: 'Produto sem Nome',
            'description' => $crawler->filter('p.ui-pdp-description__content')->text() ?: 'Descrição não encontrada',
            'price' => $crawler->filter('span.andes-money-amount__fraction')->text() ?: 'Preço não encontrado',
            'image_url' => $crawler->filter('img.ui-pdp-image.ui-pdp-gallery__figure__image')->attr('src') ?: $crawler->filter('img.ui-pdp-image')->attr('src'),
        ];
    }
}
