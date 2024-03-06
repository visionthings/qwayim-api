<?php

namespace App\Http\Controllers\Dashboard\Web\Subscription;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $getDataGroupByCountry;
    public function __construct()
    {
    }
    public function index()
    {

        $subscripers = User::where('status','active')->latest()->paginate(10); 

        //********************************************************************************** */
        // chart js cercal
        $firstDayOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
        $lastDayOfLastMonth = Carbon::now()->subMonth()->endOfMonth();
        
        $currentMonthSubscripers = User::where('status','active')->whereMonth('created_at',Carbon::now()->month)->count();
        $lastMonthSubscripers = User::where('status','active')->whereBetween('created_at', [$firstDayOfLastMonth, $lastDayOfLastMonth])->count();
        //********************************************************************************** */
        // chart js line
        $newSubscripers = User::select(DB::raw('MONTHNAME(created_at) as month'), DB::raw('COUNT(*) as count'))
                                ->groupBy(DB::raw('MONTHNAME(created_at)'))->where('status','active')->get();

        $cancelSubscripers = User::select(DB::raw('MONTHNAME(updated_at) as month'), 
                                          DB::raw('COUNT(*) as count'))
                                ->groupBy(DB::raw('MONTHNAME(updated_at)'))
                                ->where('status','archived')
                                ->get();
                                                
        //********************************************************************************** */
        // best subscripers
        $superiorSubscripers = User::where('status','active')
                        ->withCount('comments')
                        ->whereHas('comments')
                        ->orderByDesc('comments_count')
                        ->take(5)->get(); 
        //********************************************************************************** */
        // get data by country
        $getDataGroupByCountryTotal = User::where('status','active')->count();
        $getDataGroupByCountry = User::where('status','active')->select('country_code', DB::raw('COUNT(*) as count'))
                                        ->groupBy('country_code')->get();

        
        //********************************************************************************** */

        return view('Dashboard.subscriptions.index',
                compact(
                        'subscripers',
                        'currentMonthSubscripers',
                        'lastMonthSubscripers',
                        'newSubscripers',
                        'cancelSubscripers',
                        'superiorSubscripers',
                        'getDataGroupByCountry',
                        'getDataGroupByCountryTotal',
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
        $request->merge([
            'admin_id'=>Auth::guard('admin')->user()->id,
            'status'=>'admin',
        ]);

        $store = Favorite::create($request->all());
        return response()->json([
            'data'=>[
                'message'=>'تم الاضافة الي المفضله بنجاح',
            ],
            'statusCode'=>200,
        ]);
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
        $update = User::find($id);
        $update->update([
            'status'=>'block',
        ]);
        return redirect()->back()->with('success','تم حظر المستخدم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    //get subscriper profile
    public function subscriperProfile($id){
        $subscriper = User::with(['comments'=>fn($q)=>$q->latest()->take(5)])->with(['questions'=>fn($q)=>$q->latest()->take(5)])->with('answers')->find($id);
        return view('Dashboard.subscriptions.userprofile',compact('subscriper'));
    }
    // // subscriper profile block
    // public function subscriperProfileBlock($id){
    //     $subscriper = User::find($id);
    //     $subscriper->update([
    //         'status'
    //     ]);
    //     return redirect()->route('subscriptions.index')->with('success','تم حظر المستخدم بنجاح');
    // }
}
