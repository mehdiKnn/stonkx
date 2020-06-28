<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

class AdminNewsController extends Controller
{
    public function index(News $news){
        return view('admin.news.index',['news'=>$news->get()]);
    }

    public function show($id, News $news){
        return view('admin.news.show', ['news'=>$news->find($id)]);
    }

    public function delete($id, News $news){

        $current = $news->find($id);
        if ($current) {
            $current->delete();
        }
        return redirect()->route('admin.news.index');

    }

    public function create(){
        return view('admin.news.show');
    }

    public function store(News $news, Request $request)
    {
        $news->title = $request->title;
        $news->author = $request->author;
        $news->content = $request->contenu;
        $news->summary = $request->summary;
        $news->release_date = $request->release_date;
        $news->active = 1;
        $image_name = $request->file('file')->getRealPath();
        Cloudder::upload($image_name ,null, array("folder"=>"Stonk/news/"));
        $image = Cloudder::getResult();
        $news->img = $image['url'];
        try {
            $news->save();
            return redirect()->route('admin.news.index');
        } catch (\Throwable $e) {
           $request->session()->flash('notif', "Une erreur est survenue lors de l'enregistrement");
          return redirect()->back()->withInput();

        }
    }

    public function update($id,News $news, Request $request){

        $current = $news->find($id);

        $current->title = $request->title;
        $current->author = $request->author;
        $current->content = $request->contenu;
        $current->summary = $request->summary;
        if ($request->release_date ==! ''){
            $current->release_date = $request->release_date;
        }

        $current->active = 1;
        if ($request->hasFile('file')){
            $image_name = $request->file('file')->getRealPath();
            Cloudder::upload($image_name ,null, array("folder"=>"Stonk/news/"));
            $image = Cloudder::getResult();
            $current->img = $image['url'];
        }
        try {
        $current->save();
            return redirect()->route('admin.news.index');
        } catch (\Throwable $e) {
            $request->session()->flash('notif', "Une erreur est survenue lors de la modification");
            return redirect()->back()->withInput();
        }
    }
}
