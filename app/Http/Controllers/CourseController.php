<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        if ($courses->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No courses found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Courses retrieved successfully',
            'data' => $courses
        ], 200);
        
    }

    public function show($id)
    {
        $courses = Course::where('id', $id)->first();

        if (!$courses) {
            return response()->json([
                'status' => 'error',
                'message' => 'Course not found'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Course retrieved successfully',
            'data' => $courses
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'course_code' => 'required|string',
            'course_name' => 'required|string',
            'description' => 'required|string',
            'units' => 'required|integer',
            'department' => 'required|string',
            'instructor_id' => 'required|integer',
        ]);

        if($validatedData){
           $courses = Course::create([
               'course_code' => $validatedData['course_code'],
               'course_name' => $validatedData['course_name'],
               'description' => $validatedData['description'],
               'units' => $validatedData['units'],
               'department' => $validatedData['department'],
               'instructor_id' => $validatedData['instructor_id'],
            ]);

            if(!$courses) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Course creation failed'
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Course created successfully',
                'data' => $courses
            ]);
        }
    }

    public function update(Request $request, $id)
    {
            $validatedData = $request->validate([
            'course_code' => 'required|string',
            'course_name' => 'required|string',
            'description' => 'required|string',
            'units' => 'required|integer',
            'department' => 'required|string',
            'instructor_id' => 'required|integer',
        ]);
        $courses = Course::where('id', $id)->first();
        if (!$courses) {
            return response()->json([
                'status' => 'error',
                'message' => 'Course not found'
            ]);
        }
        $updatedCourse = $courses->update([
            'course_code' => $validatedData['course_code'],
            'course_name' => $validatedData['course_name'],
            'description' => $validatedData['description'],
            'units' => $validatedData['units'],
            'department' => $validatedData['department'],
            'instructor_id' => $validatedData['instructor_id'],
        ]);

        if (!$updatedCourse) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update course'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Course updated successfully',
            'data' => $courses
        ]);
    }

    public function destroy($id)
    {
        $courses = Course::where('id', $id)->first();
        if (!$courses) {
            return response()->json([
                'status' => 'error',
                'message' => 'Course not found'
            ]);

        }
        $courses->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Course deleted successfully'
        ]);
    }
}
