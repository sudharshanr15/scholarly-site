<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class DepartmentController extends Controller
{
    public function index(){
        $departments = DB::table("departments")
            ->join("schools", "school_id", "=", "schools.id")
            ->select("departments.id", "departments.school_id", "departments.name as dept_name", "schools.name as school_name")
            ->get();

        return view("department.index", [
            "departments" => $departments
        ]);
    }

    public function create(){
        $schools = School::all();

        return view("department.form", [
            "schools" => $schools
        ]);
    }

    public function store(Request $request){
        $attributes = $request->validate([
            "name" => ["required", "min:3"],
            "school_id" => ["required", "exists:schools,id"]
        ]);

        $department = new Department;
        $department->setRawAttributes($attributes);

        if(!$department->save()){
            throw ValidationException::withMessages([
                "name" => "Unable to create new record"
            ]);
        }

        return back();
    }

    public function edit(int $id){
        $department = Department::findOrFail($id);
        $schools = School::all();

        return view("department.edit_form", [
            "department" => $department,
            "schools" => $schools
        ]);
    }

    public function update(Request $request, int $id){
        $department = Department::findOrFail($id);

        $attributes = $request->validate([
            "name" => ["required", "min:3"],
            "school_id" => ["required", "exists:schools,id"]
        ]);

        $department->setRawAttributes($attributes);

        if($department->isDirty()){
            if(!$department->save()){
                throw ValidationException::withMessages([
                    "name" => "Unable to update record"
                ]);
            }
        }

        return back();
    }
}
