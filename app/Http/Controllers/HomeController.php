<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',[
            "title" => "Artikel",
            "artikels" => Artikel::all(),
            "categories" => Category::all()
        ]);
    }

    public function postHandler(Request $request)
    {
        if($request->submit=="store"){
            $request->validate(['title'=>'required','content'=>'required','category_id'=>'required','image'=>'required']);
            $artikel = new Artikel;
            $artikel->title       = $request->title;
            $artikel->content     = $request->content;
            $artikel->category_id = $request->category_id;
            $artikel->image       = $request->image;
            $artikel->user_id     = Auth::user()->id;
            $artikel->save();
            return view('home',[
                "success" => "Artikel berhasil ditambahkan",
                "artikels" => Artikel::all(),
                "categories" => Category::all()
            ]);
        }

        if($request->submit=="update"){
            $request->validate(['id'=>'required','title'=>'required','content'=>'required','category_id'=>'required','image'=>'required',]);
            $artikel = Artikel::find($request->id);
            $artikel->title       = $request->title;
            $artikel->content     = $request->content;
            $artikel->category_id = $request->category_id;
            $artikel->image       = $request->image;
            $artikel->save();
            return view('home',[
                "success" => "Artikel berhasil diedit",
                "artikels" => Artikel::all(),
                "categories" => Category::all()
            ]);
        }

        if($request->submit=="delete"){
            $request->validate(['id'=>'required',]);
            $artikel = Artikel::find($request->id);
            if($artikel){
                $judul = $artikel->title;
                $artikel->delete();
                return view('home',[
                    "success" => $judul." berhasil dihapus",
                    "artikels" => Artikel::all(),
                    "categories" => Category::all()
                ]);
            }else{
                return view('home',[
                    "error" => "Artikel tidak ditemukan",
                    "artikels" => Artikel::all(),
                    "categories" => Category::all()
                ]);
            }
            
        }

        return view('home',[
            "artikels" => Artikel::all(),
            "categories" => Category::all()
        ]);
            
    }

}
