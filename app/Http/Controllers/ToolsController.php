<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

class ToolsController extends Controller
{
    public function parse_date($date)
    {
        $dateFormat = date_create($date);
        return date_format($dateFormat,"d/m/Y H:i");
    }

    public function getBlogWordpressId()
    {
//        $dataToPost =[];
//        $stream = [
//            'ssl' => [
//                'verify_peer' => false,
//                'verify_peer_name' => false,
//                'allow_self_signed' => true,
//            ],
//        ];
//        $client = new Client();
//        $request = $client->get('https://cmlabs.co/wp-json/wp/v2/posts?per_page=5',['verify'=> false]);
//        $response = $request->getBody()->getContents();
//        $dataArr=json_decode($response,true );
//        foreach ($dataArr as $data){
//            array_push($dataToPost,[
//                "title" => $data["title"]["rendered"],
//                "date" => $this->parse_date($data["date"]),
//                "link" => $data["link"]
//            ]);
//        }
        return json_decode(file_get_contents(base_path('resources/js/json/idBlog.json')),true);
    }

    public function getBlogWordpressEn()
    {
//        $dataToPost =[];
//        $stream = [
//            'ssl' => [
//                'verify_peer' => false,
//                'verify_peer_name' => false,
//                'allow_self_signed' => true,
//            ],
//        ];
//        $result_from_json = file_get_contents('https://cmlabs.co/en/wp-json/wp/v2/posts?per_page=5',false,stream_context_create($stream));
//        $client = new Client();
//        $request = $client->get('https://cmlabs.co/en/wp-json/wp/v2/posts?per_page=5',['verify'=> false]);
//        $response = $request->getBody()->getContents();
//        $dataArr=json_decode($response,true );
//        foreach ($dataArr as $data){
//            array_push($dataToPost,[
//                "title" => $data["title"]["rendered"],
//                "date" => $this->parse_date($data["date"]),
//                "link" => $data["link"]
//            ]);
//        }
        return json_decode(file_get_contents(base_path('resources/js/json/enBlog.json')),true);
    }

    public function strikethrough()
    {
        return view('Tools/strikethrough');
    }

    public function FAQ($lang)
    {
        $dataID = $this->getBlogWordpressId();
        $dataEN = $this->getBlogWordpressEn();
        App::setLocale($lang);
        $local = App::getLocale();
        return view('Tools/faq', compact('local', 'dataID', 'dataEN'));
    }

    public function wordcounter($lang)
    {
        $dataID = $this->getBlogWordpressId();
        $dataEN = $this->getBlogWordpressEn();
        App::setLocale($lang);
        $local = App::getLocale();
        return view('Tools/wordcounter', compact('local', 'dataID', 'dataEN'));
    }

    public function creditcard($local)
    {
        App::setLocale($local);
        $lang = App::getLocale();
        return view('Tools/creditcard');
    }

    public function symbolandtext($local)
    {
        App::setLocale($local);
        $lang = App::getLocale();
        return view('Tools/symbolandtext');
    }

    public function metachecker($lang)
    {
        $dataID = $this->getBlogWordpressId();
        $dataEN = $this->getBlogWordpressEn();
        App::setLocale($lang);
        $local = App::getLocale();
        return view('Tools/metachecker', compact('local', 'dataID', 'dataEN'));
    }

    public function pagespeed($lang)
    {
        $dataID = $this->getBlogWordpressId();
        $dataEN = $this->getBlogWordpressEn();
        App::setLocale($lang);
        $local = App::getLocale();
        return view('Tools/pagespeed', compact('local', 'dataID', 'dataEN'));
    }

    public function mobiletest($lang)
    {
      $dataID = $this->getBlogWordpressId();
      $dataEN = $this->getBlogWordpressEn();
      App::setLocale($lang);
      $local = App::getLocale();
      return view('Tools/mobiletest', compact('local', 'dataID', 'dataEN'));
    }

    public function sitemap($lang)
    {
      $dataID = $this->getBlogWordpressId();
      $dataEN = $this->getBlogWordpressEn();
      App::setLocale($lang);
      $local = App::getLocale();
      return view('Tools/sitemap', compact('local', 'dataID', 'dataEN'));
    }

    public function englishVersion()
    {
        $previous = url()->previous();
        $link = substr($previous, strrpos($previous,'/')+1);
        App::setLocale('en');
        session()->put('local','en');
        session()->save();
        if ($link == null) {
          return \redirect('/');
        }else {
            return \redirect('/en/'.$link);
        }
    }

    public function indonesiaVersion()
    {
        $previous = url()->previous();
        $link = substr($previous, strrpos($previous,'/')+1);
        App::setLocale('id');
        session()->put('local','id');
        session()->save();
        if ($link == null) {
          return \redirect('/');
        }else {
            return \redirect('/id/'.$link);
        }
    }



}
