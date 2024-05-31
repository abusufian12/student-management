<?php

namespace App\Http\Controllers;

use App\Models\SchoolList;
use Illuminate\Http\Request;

class SchoolListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $school_list = SchoolList::get();
        // dd($school_list);
        return view('school-list.index', compact('school_list'));
    }

    public function search(Request $request){
        $search = $request->school_type_id;

        $school_list = SchoolList::where(function($query) use ($search){
            $query->where('school_type_id', 'like', "%$search%");
        })->get();
        if(!$school_list){
            return view('school-list.index', compact('school_list'));
        }
        // dd($school_list);
        return view('school-list.index', compact('school_list', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('school-list.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'school_name' => ['required', 'string', 'max:255']
        ]);

        $data = SchoolList::create([
            'school_type_id' => $request->school_type_id,
            'school_name' => $request->school_name,
            'school_post_code' => $request->school_post_code,
            'school_city' => $request->school_city,
            'school_ken' => $request->school_ken,
            'school_address_line_1' => $request->school_address_line_1,
            'school_address_line_2' => $request->school_address_line_2,
        ]);

        return redirect()->route('school_list.index', [$data]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolList $SchoolList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolList $SchoolList, $id)
    {
        
        $school_list = SchoolList::find($id);
        // dd($SchoolList, $school_list, $id);die;

        
        return view('school-list.edit', [
            'school_list' => $school_list
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchoolList $SchoolList)
    {
        $request->validate([
            'school_name' => ['required', 'string', 'max:255']
        ]);

        $data = SchoolList::where('id', $request->id)->update([
            'school_type_id' => $request->school_type_id,
            'school_name' => $request->school_name,
            'school_post_code' => $request->school_post_code,
            'school_city' => $request->school_city,
            'school_ken' => $request->school_ken,
            'school_address_line_1' => $request->school_address_line_1,
            'school_address_line_2' => $request->school_address_line_2,
        ]);

        return redirect()->route('school_list.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolList $schoolList)
    {
        //
    }
}
