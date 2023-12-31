<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Goutte\Client;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB as FacadesDB;

class ScrapingController extends Controller
{
    public function index()
    {
        $all_data = DB::table('details')->get();
        // return response()->json($all_data);
        return view('index', compact('all_data'));
    }


    public function get_scraping(Request $request)
    {

        $client = new Client();
        $data_f_scaraping = [];
        $page = $request->input('page');


        $crawler = $client->request('GET', "https://www.kotobati.com/section/%D8%B1%D9%88%D8%A7%D9%8A%D8%A7%D8%AA?page=$page");


        $crawler->filter('.book-teaser ')->each(function ($listelment) use (&$client, &$data_f_scaraping) {



            $a = $listelment->filter('a');
            $link = $a->link();
            $pagestory = $client->click($link);
            $pagestory->filter('.media')->each(function ($listelment) use (&$data_f_scaraping,) {

                $details = $listelment->filter('.media-body')->children();
                $name = $details->eq(0)->text();
                $auther = $details->eq(1)->text();
                $numberofpages = $listelment->filter('li')->text();
                $language = $listelment->filter('li+li')->text();

                $size = $listelment->filter('li+li+li')->text();
                if (empty(trim($size))) {
                    return 'empty';
                }
                $download = $listelment->filter('li+li+li+li')->text();
                if (empty(trim($download))) {
                    return 'empty';
                }
                $filetype = $listelment->filter('li+li+li+li+li')->text();
                if (empty(trim($filetype))) {
                    return 'empty';
                }
                $data_f_scaraping['name'] = $name;
                $data_f_scaraping['auther'] = $auther;
                $data_f_scaraping['nimber_of_pages'] = $numberofpages;
                $data_f_scaraping['language'] = $language;
                $data_f_scaraping['size'] = $size;
                $data_f_scaraping['download'] = $download;
                $data_f_scaraping['filetype'] = $filetype;
            });
            $pagestory->filter('.box-btn')->each(function ($listelment) use (&$client, &$data_f_scaraping) {
                $a2 = $listelment->filter('.download')->first();
                dd($a2->attr('hre'));
            });
            dd($data_f_scaraping);
            DB::table('details')->insert($data_f_scaraping);
        });

        return redirect()->route('all')->with('success', 'succsess');
    }
}
