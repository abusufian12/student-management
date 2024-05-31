<?php

// namespace App\Helpers;
use App\Models\SchoolType;
use App\Models\SchoolList;


function formatDate($dateString, $format = 'Y-m-d')
{
    $date = new DateTime($dateString);
    return $date->format($format);
}

function schoolType(){
    $school_type = SchoolType::get();
    return $school_type;
    // dd($school_type[1]->school_type);
}

function schoolList(){
    $school_list = SchoolList::get();
    return $school_list;
    // dd($school_type[1]->school_type);
}

function schoolTypeName($type_id){
    // $school_type_name = SchoolType::findOrFail($type_id);
    $school_type_name = SchoolType::where('id',$type_id)->first();
    // $school_type_name = SchoolType::where('id', $type_id)->first();
    // dd($type_id, $school_type_name);
    // if (!$school_type_name) {
    //     return null;
    // }
    return $school_type_name;
}

function schoolName($school_id){
    $school_name = SchoolList::where('id', $school_id)->first();
    // $school_type_name = SchoolType::where('id', $type_id)->first();
    // dd($school_id, $school_name);
    return $school_name;
}
