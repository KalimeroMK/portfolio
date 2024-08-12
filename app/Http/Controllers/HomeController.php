<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Mail\ContactMail;
use App\Mail\ResponseMail;
use App\Models\Article;
use App\Models\Contribution;
use App\Models\Experience;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $experiences = Experience::with('tags')->get();
        $contributions = Contribution::with('tags')->get();
        $user = User::first();
        $customFields = json_decode($user->custom_fields, true);
        return view('index', compact('experiences', 'contributions','customFields'));
    }

    public function send(CreateRequest $request)
    {
        Mail::to('zbogoevski@gmail.com')->send(new ContactMail($request->validated()));
        $responseMail = new ResponseMail();
        Mail::to($request->email)->send($responseMail);

        return redirect(env('APP_URL') . '/#contact')->with('success', 'Message sent successfully.');
    }

    public function articles()
    {
        $articles = Article::with('tags')->get();
        return view('articles', compact('articles'));
    }

    public function article($slug)
    {
        $article = Article::whereSlug($slug)->first();
        return view('article', compact('article'));
    }

}
