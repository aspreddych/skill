<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\JobPost;
use App\Models\Company;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate scalable sitemaps';

    public function handle()
    {
        $this->generateJobSitemaps();
        $this->generateCompanySitemap();
        $this->generatePageSitemap();
        $this->generateMainSitemap();

        $this->info('All sitemaps generated successfully.');
    }

    private function generateJobSitemaps()
    {
        $limit = 50000;
        $fileIndex = 1;
        $urlCount = 0;

        $xml = $this->startUrlSet();

        JobPost::where('status','active')
            ->where('expiry_date','>',now())
            ->orderBy('id')
            ->chunk(1000, function($jobs) use (&$xml,&$urlCount,&$fileIndex,$limit){

                foreach($jobs as $job)
                {

                    $xml .= $this->jobUrlXml($job);

                    $urlCount++;

                    if($urlCount == $limit)
                    {
                        $this->writeSitemap("sitemap-jobs-$fileIndex.xml",$xml);

                        $fileIndex++;
                        $urlCount = 0;
                        $xml = $this->startUrlSet();
                    }
                }

            });

        if($urlCount > 0)
        {
            $this->writeSitemap("sitemap-jobs-$fileIndex.xml",$xml);
        }
    }

    private function generateCompanySitemap()
    {

        $xml = $this->startUrlSet();

        Company::chunk(500,function($companies) use (&$xml){

            foreach($companies as $company)
            {

                $xml .= "
                <url>
                    <loc>".url('/company/'.$company->id)."</loc>
                    <lastmod>".$company->updated_at->toAtomString()."</lastmod>
                    <changefreq>weekly</changefreq>
                    <priority>0.7</priority>
                </url>";

            }

        });

        $this->writeSitemap('sitemap-companies.xml',$xml);

    }

    private function generatePageSitemap()
    {

        $pages = [
            '/',
            '/about',
            '/contact',
            '/blog'
        ];

        $xml = $this->startUrlSet();

        foreach($pages as $page)
        {

            $xml .= "
            <url>
                <loc>".url($page)."</loc>
                <changefreq>monthly</changefreq>
                <priority>0.6</priority>
            </url>";

        }

        $this->writeSitemap('sitemap-pages.xml',$xml);

    }

    private function generateMainSitemap()
    {

        $files = glob(public_path('sitemap-*.xml'));

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach($files as $file)
        {

            $xml .= "
            <sitemap>
                <loc>".url('/'.basename($file))."</loc>
                <lastmod>".date('c')."</lastmod>
            </sitemap>";

        }

        $xml .= "</sitemapindex>";

        file_put_contents(public_path('sitemap.xml'),$xml);

    }

    private function startUrlSet()
    {

        return '<?xml version="1.0" encoding="UTF-8"?>
        <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    }

    private function jobUrlXml($job)
    {

        return "
        <url>
            <loc>".url('/jobs/'.$job->id)."</loc>
            <lastmod>".$job->updated_at->toAtomString()."</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.9</priority>
        </url>";
    }

    private function writeSitemap($filename,$xml)
    {

        $xml .= '</urlset>';

        file_put_contents(public_path($filename),$xml);

    }
}