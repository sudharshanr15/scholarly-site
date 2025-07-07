<?php

namespace App\Http\Controllers;

use App\Models\ArticleTag;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ArticleTagController extends Controller
{
    public function store(Request $request){
        $attributes = $request->validate([
            "article_id" => ["required", "exists:articles,id"],
            "tag_id" => ["required", "exists:tags,id"]
        ]);

        $article_tag = new ArticleTag();
        $article_tag->setRawAttributes($attributes);

        if(!$article_tag->save()){
            throw ValidationException::withMessages([
                "article_id" => "Unable to create new record"
            ]);
        }

        return back();
    }

    public function destroy(int $id){
        $article_tag = ArticleTag::findOrFail($id);

        $article_tag->delete();

        return back();
    }
}
