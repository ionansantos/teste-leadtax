<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Scraper;
use App\Services\ProductPersister;
use App\Exceptions\ScrapingException;

class ScrapeProducts extends Command
{
    protected $signature = 'scrape:products';
    protected $description = 'Scrapes product data from an e-commerce site';

    protected $scraper;
    protected $persister;

    public function __construct(Scraper $scraper, ProductPersister $persister)
    {
        parent::__construct();
        $this->scraper = $scraper;
        $this->persister = $persister;
    }

    public function handle()
    {
        $this->info('Iniciando scraping de produtos...');

        try {
            $crawler = $this->scraper->scrape('https://www.mercadolivre.com.br');
            $crawler->filter('div.poly-card')->each(function ($node) {
                try {
                    $data = $this->scraper->extractProductData($node);
                    $this->persister->saveProduct($data);
                } catch (ScrapingException $e) {
                    $this->warn('Erro ao processar produto: ' . $e->getMessage());
                }
            });

            $this->info('Scraping concluído com sucesso!');
        } catch (\Exception $e) {
            $this->error('Erro fatal: ' . $e->getMessage());
        }
    }
}
