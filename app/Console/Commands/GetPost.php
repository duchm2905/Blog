<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\post;

class GetPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feeds:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $posts = $this->crawler();
        $this->insertCrawler($posts);
    }

    protected function getCrawlerID(){
        $crawler_id = post::select('crawler_id')->get()->toArray();
        $array_Crawler_Id = array();
        foreach ($crawler_id as $craw){
            array_push($array_Crawler_Id,$craw['crawler_id']);
        }
        return $array_Crawler_Id;
    }

    protected function crawler(){
        $crawler = \Config::get('crawler.rss');
        $url = 'https://vnexpress.net/rss/';
        $post = array();
        $array_Post_ID = array();
        $array_Crawler_Id = $this->getCrawlerID();
        foreach ($crawler as $crawler) {
            $curl_handle = curl_init();
            curl_setopt($curl_handle, CURLOPT_URL, $url . $crawler);
            curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
            $feed = curl_exec($curl_handle);
            curl_close($curl_handle);
            $xml = simplexml_load_string($feed);
            if ($xml) {
                $item = $xml->channel->item;
                foreach ($item as $item) {
                    $Array_id = explode('-', (string)$item->link);
                    $id = (int)str_replace('.html', '', end($Array_id));
                    if(!in_array($id,$array_Crawler_Id) && !in_array($id,$array_Post_ID)) {
                        $itemRSS = array(
                            'title' => (string)$item->title,
                            'link' => (string)$item->link,
                            'pubDate' => date("Y-m-d H:i:s",strtotime($item->pubDate)),
                            'description' => substr((string)$item->description, strpos((string)$item->description, '</br>')+5),
                            'crawler_id' => $id,
                            'user_id'=> 1
                        );
                        array_push($post, $itemRSS);
                        array_push($array_Post_ID,$id);
                    }
                }
            }
        }
        return $post;
    }

    protected function insertCrawler($post){
        var_dump($post);
        if($post != Null) {
            post::insert($post);
            echo 'ok';
        }
        else{
            echo 'no have new post!';
        }
    }
}
