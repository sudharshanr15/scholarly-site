<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ArticleController extends Controller
{
    public function create(){
        return view ('article.create');
    }

    public function store(Request $request){
        $attributes = $request->validate([
            "link" => ["required", "url:http,https"],
            "title" => ["required"],
            "faculty_id" => ["required", "exists:users_faculty,id"],
            "published_year" => ["required", "numeric"],
            "apa" => ["required"]
        ]);

        $article = new Article;
        $article->setRawAttributes($attributes);

        if(!$article->save()){
            throw ValidationException::withMessages([
                "name" => "Unable to create new record"
            ]);
        }

        return back();
    }

    public function edit(int $id){
        $article = Article::findOrFail($id);

        return view("article.edit", ["article" => $article]); 
    }

    public function update(Request $request, int $id){
        $article = Article::findOrFail($id);

        $attributes = $request->validate([
            "type" => ["required"],
            "indexed_in" => ["required"]
        ]);

        $article->setRawAttributes($attributes);

        if($article->isDirty()){
            if(!$article->save()){
                throw ValidationException::withMessages([
                    "error" => "Unable to update record"
                ]);
            }
        }

        return back();
    }

}
