<?php

namespace App\Http\Controllers\User\Api\Vist;

use App\Http\Controllers\Controller;
use App\Models\Vist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class VistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $checkVistId = Vist::where('vist_id',$request->vist_id)->first();
        if(!$checkVistId){
            $store = Vist::create([
                'vist_id'=>Str::uuid(),
            ]);
            return response()->json([
                'data'=>$store->vist_id,
                'statusCode'=>200,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
