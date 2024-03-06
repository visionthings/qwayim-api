<?php

namespace App\Http\Controllers\Dashboard\Web\Report;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Place;
use App\Models\Question;
use App\Models\Suggestion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDO;

class ReportController extends Controller
{
    public function index(){
        return view('Dashboard.reports.index');
    }

    // get subscribe view
    public function subscribeView(){
        $firstDayOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
        $lastDayOfLastMonth = Carbon::now()->subMonth()->endOfMonth();
        
        // get last month subscripers
        $lastMonthSubscripers = User::where('status','active')->whereBetween('created_at', [$firstDayOfLastMonth, $lastDayOfLastMonth])->count();
        // get this month subscripers
        $getThisMonthSubscripers = User::whereMonth('created_at',Carbon::now()->month)->where('status','active')->latest()->get();




        $getThisMonthCancelSubscripers = User::where('status','archived')->whereMonth('created_at',Carbon::now()->month)->latest()->get();
        $getAllSubscripers = User::where('status','active')->count();
        return view('Dashboard.reports.subscribe',compact('getThisMonthSubscripers','getThisMonthCancelSubscripers','getAllSubscripers','lastMonthSubscripers'));
    }

    // get best places search
    public function bestPlacesSearch() {
        $bestPlacesSearch = Place::orderBy('search_count','DESC')->paginate(10);
        return view('Dashboard.reports.bestsearch',compact('bestPlacesSearch'));
    }

    // get interaction view
    public function interaction(){
        //********************************************************************************** */
        // comments
        $firstDayOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
        $lastDayOfLastMonth = Carbon::now()->subMonth()->endOfMonth();
        $currentMonthComments = Comment::whereMonth('created_at',Carbon::now()->month)->count();
        $lastMonthComments = Comment::whereBetween('created_at', [$firstDayOfLastMonth, $lastDayOfLastMonth])->count();
        $getAllComments = Comment::count();
        //********************************************************************************** */
        // question
        $currentMonthQuestions = Question::whereMonth('created_at',Carbon::now()->month)->count();
        $lastMonthQuestions = Question::whereBetween('created_at', [$firstDayOfLastMonth, $lastDayOfLastMonth])->count();
        // dd($lastMonthQuestions);
        $getAllQuestions = Question::count();
        //********************************************************************************** */
        // question
        $getAllSuggestion    = Suggestion::count();
        $thisMonthsuggestion = Suggestion::whereMonth('created_at',Carbon::now()->month)->count();
        $lastMonthsuggestion = Suggestion::whereBetween('created_at', [$firstDayOfLastMonth, $lastDayOfLastMonth])->count();

        return view('Dashboard.reports.interaction',compact(
            'currentMonthComments',
            'lastMonthComments',
            'getAllComments',

            'currentMonthQuestions',
            'lastMonthQuestions',
            'getAllQuestions',
            
            'getAllSuggestion',
            'thisMonthsuggestion',
            'lastMonthsuggestion'
        ));
    } 
}
