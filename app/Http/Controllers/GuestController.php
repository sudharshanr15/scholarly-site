<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\UserFaculty;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(Request $request){
        $isSearched = false;
        if($request->input("query")){
            $isSearched = true;
            $articles = UserFaculty::join("articles as a","a.faculty_id","=","users_faculty.id")
                ->where("users_faculty.full_name","like","%" . $request->input("query") . "%")
                ->orWhere("a.title","like","%" . $request->input("query") . "%")
                ->select("users_faculty.full_name", "a.*")
                ->paginate(16);

            $authors = $articles->unique("users_faculty.id");

            return view("guest.search",compact("articles","isSearched"));
        }

        return view("guest.index");
    }
}
