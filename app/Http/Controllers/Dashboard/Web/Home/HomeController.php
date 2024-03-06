<?php

namespace App\Http\Controllers\Dashboard\Web\Home;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Place;
use App\Models\Suggestion;
use App\Models\User;
use App\Models\Vist;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // week
        $startThisWeekDate = Carbon::now()->startOfWeek();
        $endThisWeekDate = Carbon::now()->endOfWeek();

        $startLastWeekDate = Carbon::now()->startOfWeek()->subWeek();
        $endLastWeekDate = Carbon::now()->endOfWeek()->subWeek();

        // month
        $startThisMonthDate = Carbon::now()->startOfMonth();
        $endThisMonthDate = Carbon::now()->endOfMonth();

        $startLastMonthDate = Carbon::now()->startOfMonth()->subMonth();
        $endLastMonthDate = Carbon::now()->endOfMonth()->subMonth();





        // $allSubscripersCount = User::count();
        // subscripers
        $thisWeekSubscripers =  User::whereBetween('created_at', [$startThisWeekDate, $endThisWeekDate])->count();
        $lastWeekSubscripers = User::whereBetween('created_at', [$startLastWeekDate, $endLastWeekDate])->count();

        //vistor
        $allVistor = Vist::count();
        $thisWeekVistor = Vist::whereBetween('created_at', [$startThisWeekDate, $endThisWeekDate])->count();
        $lastWeekVistor = Vist::whereBetween('created_at', [$startLastWeekDate, $endLastWeekDate])->count();
        
        $thisMonthVistor = Vist::whereBetween('created_at', [$startThisMonthDate, $endThisMonthDate])->count();
        $lastMonthVistor = Vist::whereBetween('created_at', [$startLastMonthDate, $endLastMonthDate])->count();
        
        //comments
        $thisMonthComments = Comment::selectRaw('WEEK(created_at) as week_number, COUNT(*) as total_records')
                                            ->whereMonth('created_at', '=', now()->month)
                                            ->whereYear('created_at', '=', now()->year)
                                            ->groupBy('week_number')
                                            ->get(); 
                            // return $thisMonthComments;
                             
        $thisWeekComments = Comment::whereBetween('created_at', [$startThisWeekDate, $endThisWeekDate])->count(); 
        $lastWeekComments = Comment::whereBetween('created_at', [$startLastWeekDate, $endLastWeekDate])->count(); 


        //best search palces
        $bestPlacesSearch = Place::orderBy('search_count','DESC')->take(5)->get();

        // get suggestions
        $lastFiveSuggestions =  Suggestion::latest()->take(5)->get();
        return view('Dashboard.home.index',compact(
            'thisWeekSubscripers',
            'lastWeekSubscripers',
            'allVistor',
            'thisWeekVistor',
            'lastWeekVistor',
            'thisMonthVistor',
            'lastMonthVistor',
            'thisWeekComments',
            'lastWeekComments',
            'thisMonthComments',
            'bestPlacesSearch',
            'lastFiveSuggestions'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
