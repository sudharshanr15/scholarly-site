<?php

namespace App\Http\Controllers;

use App\Models\FacultyCitation;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FacultyCitationController extends Controller
{
    public function create(){
        return view("faculty_citation.create");
    }

    public function store(Request $request){
        $attributes = $request->validate([
            "faculty_id" => ["required", "exists:users_faculty,id"],
            "g_total_citation" => ["required"],
            "g_h_index" => ["required"],
            "g_i10" => ["required"]
        ]);

        $citation = new FacultyCitation;
        $citation->setRawAttributes($attributes);

        if(!$citation->save()){
            throw ValidationException::withMessages([
                "faculty_id" => "Unable to create new record"
            ]);
        }

        return back();
    }

    public function edit(int $id){
        $citation = FacultyCitation::findOrFail($id);

        return view("faculty_citation.edit", ["citation" => $citation]);
    }

    public function update_faculty(Request $request, int $id){
        $stored_citation = FacultyCitation::findOrFail($id);

        $attributes = $request->validate([
            "s_total_citation" => ["required"],
            "s_h_index" => ["required"],
            "s_i10" => ["required"],
            "wos_total_citation" => ["required"],
            "wos_h_index" => ["required"],
            "wos_i10" => ["required"],
        ]);

        $stored_citation->setRawAttributes($attributes);

        if($stored_citation->isDirty()){
            if(!$stored_citation->save()){
                throw ValidationException::withMessages([
                    "faculty_id" => "Unable to create new record"
                ]);
            }
        }

        return back();
    }

    public function update_admin(Request $request, int $id){
        $stored_citation = FacultyCitation::findOrFail($id);

        $attributes = $request->validate([
            "g_total_citation" => ["required"],
            "g_h_index" => ["required"],
            "g_i10" => ["required"]
        ]);

        $stored_citation->setRawAttributes($attributes);

        if($stored_citation->isDirty()){
            if(!$stored_citation->save()){
                throw ValidationException::withMessages([
                    "faculty_id" => "Unable to create new record"
                ]);
            }
        }


        return back();
    }
}
