<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Location/Index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $request)
    {
        $validatedData = $request->validated();

        $location = Location::create($validatedData);

        return response()->json([
            'message' => 'Location created successfully', 
            'location' => $location
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        $location = Location::findorFail($location->id);

        if (!$location) {
            return redirect()->back()->with('error', 'Location not found.');
        }
        
        return response()->json($location);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        $validatedData = $request->validated();

        $location->update($validatedData);

        return response()->json([
            'message' => 'Location updated successfully', 
            'location' => $location->fresh()
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        try {
            $location = Location::findOrFail($location->id);
            $location->delete();

            return response()->json(['message' => 'Location deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete location: ' . $e->getMessage()], 500);
        }
    }
}
