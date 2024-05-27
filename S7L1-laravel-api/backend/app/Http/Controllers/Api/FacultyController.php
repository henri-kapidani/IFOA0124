<?php

namespace App\Http\Controllers\Api;

use App\Models\Faculty;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFacultyRequest;
use App\Http\Requests\UpdateFacultyRequest;

class FacultyController extends Controller
{
    public function index()
    {
        // TODO: expand subject for each degree
        $faculties = Faculty::with('degrees')->get(); // select * from faculties JOIN degrees ...
        return $faculties;
    }

    public function show($id)
    {
        $faculty = Faculty::with('degrees', 'degrees.subjects')->find($id);
        if (!$faculty) {
            return response(['message' => 'Not found'], 404);
        }
        // return view('faculties.show', ['faculty' => $faculty]);
        return [
            'success' => true,
            'data' => $faculty
        ];
    }
}
