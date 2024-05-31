<?php

namespace App\Http\Controllers;

use App\Models\SchoolType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Providers\RouteServiceProvider;
use Illuminate\View\View;

class SchoolTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $school_type = SchoolType::get();
        
        return view('school-type.index', compact('school_type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('school-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'school_type' => ['required', 'string', 'max:255']
        ]);

        $data = SchoolType::create([
            'school_type' => $request->school_type,
        ]);

        return redirect()->route('school_type.index', [$data]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolType $schoolType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolType $schoolType, $id)
    {
        
        $school_type = SchoolType::find($id);
        // dd($schoolType, $school_type, $id);die;

        
        return view('school-type.edit', [
            'school_type' => $school_type
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchoolType $schoolType)
    {
        $request->validate([
            'school_type' => ['required', 'string', 'max:255']
        ]);
        // dd($request->id, $schoolType);
        SchoolType::where('id', $request->id)
       ->update([
           'school_type' => $request->school_type
        ]);

        return redirect()->route('school_type.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolType $schoolType)
    {
        //
    }
}
