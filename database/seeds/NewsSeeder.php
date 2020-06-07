<?php

use Illuminate\Database\Seeder;
use App\News;
use JD\Cloudder\Facades\Cloudder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $json = File::get("database/data/news.json");
        $data = json_decode($json);
        foreach ($data as $obj){
            Cloudder::upload(storage_path("images/news/".$obj->img),null, array("folder"=>"dev/news/"));
            $img = Cloudder::getResult();
            $news = new News();
            $news->title = $obj->title;
            $news->summary = $obj->summary;
            $news->content = $obj->content;
            $news->active = true;
            $news->release_date = \Carbon\Carbon::now();
            $news->img = $img['url'];
            $news->author = $obj->author;
            $news->save();
        }
    }
}
