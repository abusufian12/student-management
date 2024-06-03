<?php

namespace App\Http\Controllers;

use App\Models\StudentInfo;
use Illuminate\Http\Request;

class StudentInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $student_info = StudentInfo::get();
        
        return view('student-info.index', compact('student_info'));
    }

    public function search(Request $request){
        $school_type_id = $request->school_type_id;
        $school_name_id = $request->school_name_id;
        $year = $request->year;
        $session = $request->session;
        // dd($session, $year, $school_name_id, $school_type_id);


        $student_info = StudentInfo::where(function($query) use ($school_type_id, $school_name_id, $year, $session){
            $query->where('school_type_id', 'like', "%$school_type_id%")
                  ->where('school_name_id', 'like', '%' . $school_name_id . '%')
                  ->where('year', 'like', '%' . $year . '%')
                  ->where('session', 'like', '%' . $session . '%');
        })->get();
        if(!$student_info){
            return view('student-info.index', compact('student_info'));
        }
        // dd($student_info);
        return view('student-info.index', compact('student_info', 'school_type_id', 'school_name_id', 'year', 'session'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student-info.create');
    }

    public function studentRegistration()
    {
        return view('student-info.student-registration');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_name' => ['required', 'string', 'max:255']
        ]);

        $data = StudentInfo::create([
            'school_type_id' => $request->school_type_id,
            'school_name_id' => $request->school_name_id,
            'student_name' => $request->student_name,
            'student_gender' => $request->student_gender,
            'student_contact_number' => $request->student_contact_number,
            'student_graduation' => $request->student_graduation,
            'student_fb_id' => $request->student_fb_id,
            'student_country' => $request->student_country,
            'student_apartment' => $request->student_apartment,
            'year' => $request->year,
            'session' => $request->session,
            'school_address_line_1' => $request->school_address_line_1,
            'school_address_line_2' => $request->school_address_line_2,
            'resume_link' => $request->resume_link,
        ]);

        return redirect()->route('student_info.index', [$data]);
    }

    public function studentStore(Request $request)
    {
        $request->validate([
            'student_name' => ['required', 'string', 'max:255']
        ]);

        $data = StudentInfo::create([
            'school_type_id' => $request->school_type_id,
            'school_name_id' => $request->school_name_id,
            'student_name' => $request->student_name,
            'student_gender' => $request->student_gender,
            'student_contact_number' => $request->student_contact_number,
            'student_graduation' => $request->student_graduation,
            'student_fb_id' => $request->student_fb_id,
            'student_country' => $request->student_country,
            'student_apartment' => $request->student_apartment,
            'year' => $request->year,
            'session' => $request->session,
            'school_address_line_1' => $request->school_address_line_1,
            'school_address_line_2' => $request->school_address_line_2,
            'resume_link' => $request->resume_link,
        ]);

        // return redirect()->route('/', [$data]);
        return view('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentInfo $StudentInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentInfo $StudentInfo, $id)
    {
        
        $student_info = StudentInfo::find($id);
        // dd($StudentInfo, $student_info, $id);die;

        
        return view('student-info.edit', [
            'student_info' => $student_info
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentInfo $StudentInfo)
    {
        $request->validate([
            'student_name' => ['required', 'string', 'max:255']
        ]);

        $data = StudentInfo::where('id', $request->id)->update([
            'school_type_id' => $request->school_type_id,
            'school_name_id' => $request->school_name_id,
            'student_name' => $request->student_name,
            'student_gender' => $request->student_gender,
            'student_contact_number' => $request->student_contact_number,
            'student_graduation' => $request->student_graduation,
            'student_fb_id' => $request->student_fb_id,
            'student_country' => $request->student_country,
            'student_apartment' => $request->student_apartment,
            'year' => $request->year,
            'session' => $request->session,
            'school_address_line_1' => $request->school_address_line_1,
            'school_address_line_2' => $request->school_address_line_2,
            'resume_link' => $request->resume_link,
        ]);

        return redirect()->route('student_info.index');
    }


    public function uploadResume(Request $request) {
        if ($request->hasFile('fileUpload')) {
            $file = $request->file('fileUpload');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            
            // return 'File uploaded successfully!';
            return redirect()->route('student_info.index');
        } else {
            return 'File upload error!';
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentInfo $studentInfo)
    {
        //
    }
}
