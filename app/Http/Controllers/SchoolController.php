<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SchoolController extends Controller
{
    public function create(){
        $campuses = Campus::all();
        $schools = School::all();

        return view("school.form", [
            "campuses" => $campuses,
            "schools" => $schools
        ]);
    }

    public function store(Request $request){
        $attributes = $request->validate([
            "name" => ["required", "min:3"],
            "campus_id" => ["required", "exists:campus,id"]
        ]);

        $school = new School;
        $school->setRawAttributes($attributes);

        if(!$school->save()){
            throw ValidationException::withMessages([
                "name" => "Unable to create new record"
            ]);
        }

        return back();
    }

    public function edit(int $id){
        $school = School::findOrFail($id);
        $campuses = Campus::all();

        return view("school.edit_form", [
            "school" => $school,
            "campuses" => $campuses
        ]);
    }

    public function update(Request $request, int $id){
        $school = School::findOrFail($id);

        $attributes = $request->validate([
            "name" => ["required", "min:3"],
            "campus_id" => ["required", "exists:campus,id"]
        ]);

        $school->setRawAttributes($attributes);

        if($school->isDirty()){
            if(!$school->save()){
                throw ValidationException::withMessages([
                    "name" => "Unable to update record"
                ]);
            }
        }

        return back();
    }
}
