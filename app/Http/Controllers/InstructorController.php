<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;

class InstructorController extends Controller
{
    public function index()
    {
     $instructors = Instructor::all(); 

     if ($instructors->isEmpty()) {
           return response()->json([
               'status' => 'error',
               'message' => 'No instructors found'
           ], 404);
        }
        return response()->json([
           'status' => 'success',
           'message' => 'Instructors retrieved successfully',
            'data' => $instructors
        ], 200);
    }

    public function show($id)
    {
        $instructors = Instructor::where('id', $id)->first();

        if (!$instructors) {
            return response()->json([
                'status' => 'error',
                'message' => 'Instructor not found'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Instructor retrieved successfully',
            'data' => $instructors
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:instructors,email',
            'phone_number' => 'required|string',
            'department' => 'required|string',
            'employee_id' => 'required|string|unique:instructors,employee_id',
        ]);

        if($validatedData){
           $instructors = Instructor::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone_number' => $validatedData['phone_number'],
                'department' => $validatedData['department'],
                'employee_id' => $validatedData['employee_id'],
           ]);

           if(!$instructors){
               return response()->json([
                   'status' => 'error',
                   'message' => 'An error occurred while creating the instructor.'
               ]);
           }
           return response()->json([
               'status' => 'success',
               'message' => 'Instructor created successfully.',
               'data' => $instructors
           ]);
    }
}

    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:instructors,email',
            'phone_number' => 'required|string',
            'department' => 'required|string',
            'employee_id' => 'required|string|unique:instructors,employee_id',
        ]);
       
        $instructors = Instructor::where('id', $id)->first();
        if (!$instructors) {
            return response()->json([
                'status' => 'error',
                'message' => 'Instructor not found'
            ]);

        }

        $updatedInstructors = $instructors->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
            'department' => $validatedData['department'],
            'employee_id' => $validatedData['employee_id'],
        ]);

        if (!$updatedInstructors) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update instructor'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Instructor updated successfully',
            'data' => $instructors
        ]);
    }

    public function destroy($id)
    {
        $instructors = Instructor::where('id', $id)->first();
        if (!$instructors) {
            return response()->json([
                'status' => 'error',
                'message' => 'Instructor not found'
            ]);

        }
        $instructors->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Instructor deleted successfully'
        ]);
    }
}
        