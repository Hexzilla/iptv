<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use XmlTv\Tv;
use XmlTv\XmlTv;
use DB;

class FormatController extends Controller
{
    private $img_url;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->img_url = url("public/img/chanellogo/");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        echo "^_^";
    }

    private function getLogoUrl($logo)
    {
        return url($this->img_url . '/' . $logo);
    }

    private function m3u_format($newline = PHP_EOL)
    {
        //get data from db
        $collection = DB::table('channels')
            ->join('categories', 'channels.category_id', '=', 'categories.id')
            ->selectRaw('channels.`name` AS name, logo, url, description, categories.`name` AS category')
            ->orderBy('channels.id', 'DESC')
            ->get();

        echo ('#EXTM3U' . $newline);
        foreach ($collection as $m)
        {
            echo ('#EXTINF:-1 group-title="' . $m->category . '" tvg-logo="' . $this->getLogoUrl($m->logo) .'",' . $m->name . $newline);
            //echo( '#EXTINF:-1 tvg-name="' . $m->name . '" tvg-logo="' . $this->getLogoUrl($m->logo) . '" ' . $m->name . $newline );
            //echo( '#EXTGRP:' . $m->category . $newline );
            echo( $m->url . $newline );
        }
    }

    public function m3u(Request $request)
    {
        //this allows coors
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/plain');

        $this->m3u_format("\r\n");
    }

    public function m3u_playlist(Request $request)
    {
        //download m3u
        header('Content-Type: audio/x-mpegurl');
        header('Content-Disposition: attachment; filename=channel.m3u');

        $this->m3u_format();
    }

    private function xml_format()
    {
        //get data from db
        $collection = DB::table('channels')
            ->join('categories', 'channels.category_id', '=', 'categories.id')
            ->selectRaw('channels.`name` AS name, logo, url, description, categories.`name` AS category')
            ->orderBy('channels.id', 'DESC')
            ->get();

        //make xml
        $tv = new Tv();
        $i = 1;
        foreach ($collection as $m) {
            $channel = new Tv\Channel('channel'.$i++);
            $channel->addDisplayName(new Tv\Elements\DisplayName($m->name, 'en'));
            $channel->addIcon(new Tv\Elements\Icon($this->getLogoUrl($m->logo), '200', '200'));
            $channel->addUrl(new Tv\Elements\Url($m->url));
            $tv->addChannel($channel);
            // $programme = new Tv\Programme('channel'.$i, '20200914190000 +0200', '20210914200000 +0200');
            // $programme->addTitle(new Tv\Elements\Title('CNN News', 'en'));
            // $programme->addDescription(new Tv\Elements\Desc($m->description, 'en'));
            // $programme->addCategory(new Tv\Elements\Category('news', 'en'));
            // $tv->addProgramme($programme);
        }                    

        $xml = XmlTv::generate($tv, $validate = true);
        return $xml;
    }

    public function xml(Request $request)
    {
        $xml = $this->xml_format();

        //download xml
        return response($xml)
                ->header('Content-type', 'text/xml')
                ->header('Access-Control-Allow-Origin', '*');
    }

    public function xml_playlist(Request $request)
    {
        $xml = $this->xml_format();

        //download xml
        return response($xml)
                ->header('Content-type', 'text/xml')
                ->header('Content-Disposition', 'attachment; filename="channel.xml"');
    }

    private function json_format()
    {
        //get data from db
        $collection = DB::table('channels')
                ->join('categories', 'channels.category_id', '=', 'categories.id')
                ->selectRaw('channels.`name` AS name, logo, url, description, categories.`name` AS category')
                ->orderBy('channels.id', 'DESC')
                ->get();

        $result = collect($collection)->map(function($collection, $key) {
            $collection = (object)$collection;
            return [
                'name' => $collection->name,
                'logo' => $this->getLogoUrl($collection->logo),
                'url' => $collection->url,
                'description' => $collection->description,
                'category' => $collection->category
            ];
        });

        return $result;
    }
    
    public function json(Request $request)
    {
        $result = $this->json_format();

        //download json
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/json');
        echo json_encode($result);
    }
    
    public function json_playlist(Request $request)
    {
        $result = $this->json_format();

        //download json
        header('Content-disposition: attachment; filename=channel.json');
        header('Content-type: application/json');
        echo json_encode($result);
    }
    
    public function mag(Request $request)
    {
        $collection = DB::table('channels')
        ->join('stream_types', 'channels.stream_id', '=', 'stream_types.id')
        ->selectRaw('channels.`name` AS name, url, stream_types.name as stream')
        ->orderBy('channels.id', 'DESC')
        ->get();                        

        //download
        header('Content-disposition: attachment; filename=mag.m3u');
        header('Content-type: text/plain');

        echo ('#EXTM3U' . "\n");
        foreach ($collection as $m)
        {
            echo ('#EXTINF:0,'  . $m->name . "\n");
            echo( $m->stream . ' ' . $m->url . "\n");
        }
    }
}
