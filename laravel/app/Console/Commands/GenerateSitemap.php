<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;
use App\Models\ProductCategory;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $baseUrl = config('app.url');
        $sitemap = SitemapGenerator::create($baseUrl)->getSitemap();

        // enable for multiple sitemap files
        // $sitemapProducts = Sitemap::create();
        // $sitemapCategories = Sitemap::create();

        // Get all root categories
        $roots = ProductCategory::isRoot()->get();

        foreach ($roots as $root) {
            // Add the top level category
            $sitemap->add(
                Url::create("/{$root->slug}")
                    ->setLastModificationDate($root->updated_at ?? Carbon::now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.7)
            );

            // Get Category and Sub Categories
            $descendantsAndSelf = $root->descendantsAndSelf()->depthFirst()->get();
            foreach ($descendantsAndSelf as $path) {
                // $sitemapCategories->add( // enable if wanting separate files
                $sitemap->add( // enable for one sitemap file
                    Url::create("/{$path->slug_path}")
                        ->setLastModificationDate($root->updated_at ?? Carbon::now())
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setPriority(0.8)
                );
            }

            // Get all products under ProductCategory (including descendants)
            $products = $root->recursiveProducts()->get();
            foreach ($products as $product) {
                // $sitemapProducts->add( // enable if wanting separate files
                $sitemap->add( // enable for one sitemap file
                    Url::create("/product/{$root->slug}/{$product->slug}")
                        ->setLastModificationDate($product->updated_at ?? Carbon::now())
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setPriority(0.8)
                );
            }

            $sitemap->add(
                Url::create('/about-us')->setPriority(0.6)
            );
        }

        // Enable to write sitemaps to one file
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully with dynamic categories & products!');
    }
}
