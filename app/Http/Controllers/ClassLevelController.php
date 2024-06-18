<?php
// app/Http/Controllers/ClassLevelController.php

namespace App\Http\Controllers;

use App\Models\ClassLevel;
use Illuminate\Http\Request;


class ClassLevelController extends Controller
{
    public function index()
    {
        $classLevels = ClassLevel::orderBy('cl_name')->get();
        return view('class_levels.index', compact('classLevels'));
    }


    public function edit($id)
    {
        $classLevel = ClassLevel::find($id);
        return view('class_levels.edit', compact('classLevel'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'cl_name' => 'required|max:255',
            // Add validation rules for other fields if needed
        ]);

        // Find the class level by id
        $classLevel = ClassLevel::find($id);

        // Update the class level properties
        $classLevel->cl_name = $request->input('cl_name');
        // Update other fields as needed

        // Save the updated class level
        $classLevel->save();

        // Redirect back to the class levels index page with a success message
        return redirect()->route('class-levels')->with('success', 'Class level updated successfully.');
    }

    // app/Http/Controllers/ClassLevelController.php
    // app/Http/Controllers/ClassLevelController.php

    public function create()
    {
        return view('class_levels.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'cl_name' => 'required|max:255',
            // Add validation rules for other fields if needed
        ]);

        // Create a new ClassLevel instance and set its properties
        $classLevel = new ClassLevel();
        $classLevel->cl_name = $request->input('cl_name');
        // Set other fields as needed

        // Save the new class level to the database
        $classLevel->save();

        // Redirect back to the class levels index page with a success message
        return redirect()->route('class-levels')->with('success', 'Class level created successfully.');
    }

    public function destroy($id)
    {
        // Find the class level by id
        $classLevel = ClassLevel::find($id);

        // Check if the class level exists
        if (!$classLevel) {
            return redirect()->route('class-levels')->with('error', 'Class level not found.');
        }

        // Delete the class level
        $classLevel->delete();

        // Redirect back to the class levels index page with a success message
        return redirect()->route('class-levels')->with('success', 'Class level deleted successfully.');
    }

    public function getClassData($id_cl)
    {
        // Fetch the class data based on the selected id_cl
        $classData = [];

        if ($id_cl == 1) {
            $classData = [
                ['value' => 'A1', 'text' => 'A1'],
                ['value' => 'B1', 'text' => 'B1'],
                ['value' => 'A2', 'text' => 'A2'],
                ['value' => 'B2', 'text' => 'B2'],
                ['value' => 'A3', 'text' => 'A3'],
                ['value' => 'B3', 'text' => 'B3'],
            ];
        } elseif ($id_cl == 2) {
            $classData = [
                ['value' => '1A', 'text' => '1A'],
                ['value' => '1B', 'text' => '1B'],
                ['value' => '1C', 'text' => '1C'],
                ['value' => '2A', 'text' => '2A'],
                ['value' => '2B', 'text' => '2B'],
                ['value' => '2C', 'text' => '2C'],
                ['value' => '3A', 'text' => '3A'],
                ['value' => '3B', 'text' => '3B'],
                ['value' => '3C', 'text' => '3C'],
                ['value' => '4A', 'text' => '4A'],
                ['value' => '4B', 'text' => '4B'],
                ['value' => '4C', 'text' => '4C'],
                ['value' => '5A', 'text' => '5A'],
                ['value' => '5B', 'text' => '5B'],
                ['value' => '5C', 'text' => '5C'],
                ['value' => '6A', 'text' => '6A'],
                ['value' => '6B', 'text' => '6B'],
                ['value' => '6C', 'text' => '6C'],
            ];
        } elseif ($id_cl == 3) {
            $classData = [
                ['value' => '7A', 'text' => '7A'],
                ['value' => '7B', 'text' => '7B'],
                ['value' => '7C', 'text' => '7C'],
                ['value' => '8A', 'text' => '8A'],
                ['value' => '8B', 'text' => '8B'],
                ['value' => '8C', 'text' => '8C'],
                ['value' => '9A', 'text' => '9A'],
                ['value' => '9B', 'text' => '9B'],
                ['value' => '9C', 'text' => '9C'],
            ];
        }

        // Return the class data as a JSON response
        return response()->json($classData);
    }
}
