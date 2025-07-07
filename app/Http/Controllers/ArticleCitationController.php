<?php

namespace App\Http\Controllers;

use App\Models\ArticleCitation;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ArticleCitationController extends Controller
{
    public function store(Request $request){
        $attributes = $request->validate([
            "article_id" => ["required", "exists:articles,id"],
            "citation_year" => ["required", "numeric"],
            "citation_count" => ["required", "numeric"]
        ]);

        $citation = new ArticleCitation();
        $citation->setRawAttributes($attributes);

        if(!$citation->save()){
            throw ValidationException::withMessages([
                "error" => "Unable to create new record"
            ]);
        }

        return back();
    }
}
