<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        if ($lang==='en'){
            App::setLocale('en');
        }else{
            App::setLocale('id');
        }
        // $dataID = $this->getBlogWordpressId();
        // $dataEN = $this->getBlogWordpressEn();
        // $data = json_decode(file_get_contents(base_path('resources/js/json/tools.json')),true);
        $local = App::getLocale();
        return view('home', compact('local'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function getBlogWordpressId()
    // {
    //     // TODO : Delete this
    //     return [];
    //     try{
    //       $client = new Client();
    //       $response = $client->get("https://cmlabs.co/wp-json/wp/v2/posts?per_page=4");
    //       $data = json_decode($response->getBody()->getContents(),true);
    //       $data_fix = [];
    //       foreach ($data as $datum){
    //           array_push($data_fix,[
    //               "link" => $datum['link'],
    //               "title" => str_replace('&#038;','&',$datum['title']['rendered']),
    //               "date" => $this->parseDate($datum['date'])
    //           ]);
    //       }
    //       return $data_fix;
    //     }catch (RequestException $e){
    //         return json_decode(file_get_contents(base_path('resources/js/json/idBlog.json')),true);
    //     }

    // }

    // public function getBlogWordpressEn()
    // {
    //     // TODO : Delete this
    //     return [];
    //     try {
    //       $client = new Client();
    //       $response = $client->get("https://cmlabs.co/en/wp-json/wp/v2/posts?per_page=4");
    //       $data = json_decode($response->getBody()->getContents(),true);
    //       $data_fix = [];
    //       foreach ($data as $datum){
    //           array_push($data_fix,[
    //               "link" => $datum['link'],
    //               "title" => str_replace('&#038;','&',$datum['title']['rendered']),
    //               "date" => $this->parseDate($datum['date'])
    //           ]);
    //       }
    //       return $data_fix;
    //     }catch (RequestException $e){
    //         return json_decode(file_get_contents(base_path('resources/js/json/enBlog.json')),true);
    //     }
    // }

    // public function parseDate($date)
    // {
    //     $date=date_create($date);
    //     if (App::getLocale() == 'en')
    //         return date_format($date,"M d, Y - H:i");
    //     else{
    //         $month = date_format($date,"m");
    //         $id = '';
    //         switch ($month){
    //             case 1:
    //                 $id = 'Jan';
    //                 break;
    //             case 2:
    //                 $id = 'Feb';
    //                 break;
    //             case 3:
    //                 $id = 'Mar';
    //                 break;
    //             case 4:
    //                 $id = 'Apr';
    //                 break;
    //             case 5:
    //                 $id = 'Mei';
    //                 break;
    //             case 6:
    //                 $id = 'Jun';
    //                 break;
    //             case 7:
    //                 $id = 'Jul';
    //                 break;
    //             case 8:
    //                 $id = 'Agu';
    //                 break;
    //             case 9:
    //                 $id = 'Sep';
    //                 break;
    //             case 10:
    //                 $id = 'Okt';
    //                 break;
    //             case 11:
    //                 $id = 'Nov';
    //                 break;
    //             case 12:
    //                 $id = 'Des';
    //                 break;
    //         }
    //         return $id." ".date_format($date,"d, Y - H:i");
    //     }
    // }

    // public function getBlogData() {
    //     $lang = App::getLocale();

    //     try {
    //         $client = new Client();
    //         $response = $client->get("http://cmlabs.co/en/wp-json/wp/v2/posts?per_page=3");

    //         return json_decode($response->getBody()->getContents(), true);
    //     } catch (Exception $e){
    //         if ( $lang == 'id' ) {
    //             return json_decode(file_get_contents(base_path('resources/js/json/idBlog.json')), true);
    //         } else {
    //             return json_decode(file_get_contents(base_path('resources/js/json/enBlog.json')), true);
    //         }
    //     }
    // }
}
