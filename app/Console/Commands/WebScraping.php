<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Storage;

use Illuminate\Console\Command;
use Goutte\Client;
class WebScraping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'web-scraping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $client = new Client();
        $data=[];
        $data2 =[];
        $i=0;
        $url="https://www.vezeeta.com/ar/%D8%AF%D9%83%D8%AA%D9%88%D8%B1/%D9%83%D9%84-%D8%A7%D9%84%D8%AA%D8%AE%D8%B5%D8%B5%D8%A7%D8%AA/%D8%A7%D9%84%D9%82%D8%A7%D9%87%D8%B1%D8%A9?page=";
        do{
            $i++;
            $page =$url.$i;
            $data2[] =$page;

        }while($i<100);

foreach($data2 as $url2){
        $crawler = $client->request('GET', "$url2");
$div=$crawler->filter('.dfaYOD > .cIJIvF ')->each(function ($listelment) use (&$data){
$innerdata=[];
   $name=$listelment->filter('a')->text();
   $Medical_specialty =$listelment->filter('p')->text();

   $Medical_specialty2 =$listelment->filter('span > .jzapWu')->text();

   $address =$listelment->filter('span > .blwPZf')->text();
   $price =$listelment->filter('span[itemprop="priceRange"]')->text();
//    dd($price);

   $telephon =$listelment->filter("span > .iIVXOj >span")->text();

   $innerdata['name']= $name;
   $innerdata['Medical_specialty']=$Medical_specialty;
   $innerdata['Medical_specialty2']=$Medical_specialty2;
$innerdata['address']=$address;
$innerdata['price']=$price;
$innerdata['telephon']=$telephon;

$data[]=$innerdata;


});
};
$data = json_encode($data,JSON_UNESCAPED_UNICODE);

Storage::disk('public')->put('ds2.csv',$data);



        return 0;
    }
}
