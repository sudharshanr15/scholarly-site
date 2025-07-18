<?php

namespace App\Http\Controllers\Users;

use App\Helpers\SerpApi;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCitation;
use App\Models\Department;
use App\Models\FacultyCitation;
use App\Models\UserFaculty;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;

class UserFacultyController extends Controller
{
    private string $guard = "users_faculty";

    public function index(){
        $faculty_id = Auth::guard($this->guard)->user()->id;
        $serp = new SerpApi($faculty_id);
        $articles = $serp->get_articles();
        $article_citations = $serp->get_article_citations();
        $faculty_citation = $serp->get_faculty_citations();

        DB::transaction(function() use ($articles, $article_citations, $faculty_citation){
            Article::upsert($articles, "citation_id", array_keys($articles[0]));
            FacultyCitation::updateOrCreate(
                ["faculty_id" => 1],
                $faculty_citation
            );
            ArticleCitation::upsert($article_citations, "citation_id", array_keys($article_citations[0]));
        });

        return view("faculty.index");
    }

    public function index__admin(){
        $users = DB::table("users_faculty as u")
            ->join("departments as d", "u.department_id", "=", "d.id")
            ->get(["u.id", "u.full_name", "u.email", "u.mobile", "u.department_id", "u.created_at", "u.email_verified_at", "d.name as department_name"]);

        return view("admin.faculty.index", ["users" => $users]);
    }

    public function create(){
        $departments = Department::all();

        return view("faculty.register", ["departments" => $departments]);
    }

    public function store(Request $request){
        $attr = $request->validate([
            "full_name" => ["required", "min:3"],
            "email" => ["required", "email", "unique:users_faculty"],
            "password" => ["required", Password::min(8)->mixedCase()->numbers()],
            "department_id" => ["required", "exists:departments,id"],
            "mobile" => ["required"]
        ]);

        $user = UserFaculty::create($attr);

        event(new Registered($user));

        Auth::guard($this->guard)->login($user);
        // $user->sendEmailVerificationNotification();

        return redirect("/");
    }
}
