<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TagController extends Controller
{
    public function store(Request $request){
        $attributes = $request->validate([
            "name" => ["required", "unique:tags,id"]
        ]);

        $tag = new Tag();
        $tag->setRawAttributes($attributes);

        if(!$tag->save()){
            throw ValidationException::withMessages([
                "name" => "Unable to create new record"
            ]);
        }

        return back();
    }
}
