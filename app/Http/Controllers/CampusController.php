<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CampusController extends Controller
{

    public function create(){
        return view("campus.form");
    }

    public function index(){
        $campus = Campus::all();

        return view("campus.index", ["campuses" => $campus]);
    }

    public function store(Request $request){
        $attributes = $request->validate([
            "name" => ["required", "min:3"],
            "address" => ["required", "min:3"]
        ]);

        $campus = new Campus();
        $campus->name = $attributes["name"];
        $campus->address = $attributes["address"];
        if(!$campus->save()){
            throw new ValidationException([
                "name" => "Unable to create new record"
            ]);
        }

        return redirect()->route("campus.index");
    }

    public function edit(int $id){
        $campus = Campus::findOrFail($id);

        return view("campus.edit_form", ["campus" => $campus]);
    }

    public function update(Request $request, string $id){
        $campus = Campus::findOrFail($id);

        $attributes = $request->validate([
            "name" => ["required", "min:3"],
            "address" => ["required", "min:3"]
        ]);

        $campus->setRawAttributes($attributes);

        if($campus->isDirty()){
            if(!$campus->save()){
                throw ValidationException::withMessages([
                    "name" => "Unable to update record"
                ]);
            }
        }

        return back();
    }
}
