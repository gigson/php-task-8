<?php

namespace App\Http\Controllers;

use App\News;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "title" => "required",
            "desc" => "required",
            "short_desc" => "required",
            "category_id" => "required",
            "published_time" => "required",
            "image" => "required",
        ]);

        if (Input::file("image")) {
            $dest = public_path("images");
            $filename = uniqid() . ".jpg";
            $img = Input::file("image")->move($dest, $filename);
        }

        $news = News::create([
            "title" => $request->input("title"),
            "desc" => $request->input("desc"),
            "short_desc" => $request->input("short-desc"),
            "image" => $filename,
            "category_id" => $request->input("category"),
            "published_time" => $request->input("published-time"),
            "user_id" => Auth::id()
        ]);

        foreach ($request->input("tags") as $tag) {
            if ($tag == null) {
                continue;
            }
            Tag::create([
                "news_id" => $news->id,
                "name" => $tag
            ]);
        }


        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (Input::file("image")) {
            $dest = public_path("images");
            $filename = uniqid() . ".jpg";
            $img = Input::file("image")->move($dest, $filename);

            News::where([
                ["id", $request->input("id")],
            ])->update([
                "image" => $filename,
            ]);
        }

        News::where([
            ["id", $request->input("id")],
        ])->update([
            "title" => $request->input("title"),
            "desc" => $request->input("desc"),
            "short_desc" => $request->input("short-desc"),
            "category_id" => $request->input("category"),
            "published_time" => $request->input("published-time"),
        ]);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        News::where([
            ["id", $request->input("id")],
        ])->delete();

        return redirect()->route('home');
    }
}
