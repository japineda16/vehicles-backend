<?php

namespace App\Http\Controllers\vehicles;

use App\Http\Controllers\Controller;
use App\vehicle;
use Illuminate\Http\Request;
use App\Helpers\ApiHelpers;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = vehicle::with('user')->paginate(20);
        return response()->json([
            $vehicles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = vehicle::create($request->all());

       return  response()->json([201, 'Successfully completed', $store]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = vehicle::with('user')->findOrFail($id);

        return response()->json([201, 'Successfully created', $show]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = vehicle::findOrFail($id);

        $update->update($request->all());

        return response()->json([200, 'Successfully updated', $update]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = vehicle::findOrFail($id);
        $destroy->delete();

        return response()->json([200, 'Successfully deleted', null]);
    }
}
