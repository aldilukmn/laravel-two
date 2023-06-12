<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        if (!empty($search)) {
            $data  = Students::where('students.id_student', 'LIKE', '%' . $search . '%')->paginate(10)->fragment('std');
        } else {
            $data = Students::paginate(10)->fragment('std');
        }

        $data = [
            'title' => 'Students',
            'students' => $data,
            'search' => $data ?? null,
        ];

        return view('students.student', $data);
    }

    public function home()
    {
        $data = [
            'title' => 'Home',
        ];

        return view('students.home', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Create Data',
        ];

        return view('students.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentsRequest $request, Students $students)
    {
        $request->validated();

        $students = new Students;

        $students->id_student = $request->id_student;
        $students->fullName = $request->fullName;
        $students->gender = $request->gender;
        $students->address = $request->address;
        $students->email = $request->email;
        $students->phone = $request->phone;

        $students->save();

        return redirect('students')->with('success', 'Student added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Students $students, $student_id)
    {
        $get_id = $students->find($student_id);

        $data = [
            'title' => 'Edit Data',
            'id_student' => $student_id,
            'fullName' => $get_id->fullName,
            'gender' => $get_id->gender,
            'address' => $get_id->address,
            'email' => $get_id->email,
            'phone' => $get_id->phone,
        ];

        return view('students.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Students $students)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentsRequest $request, Students $students, $id_student)
    {
        $data = [
            'fullName' => $request->fullName,
            'gender' => $request->gender,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
        ];

        $students->where('id_student', $id_student)->update($data);

        return redirect('students')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $students, $id_student)
    {
        $data = $students->find($id_student);
        $data->delete();
        return redirect('students')->with('success', 'Student deleted successfully');
    }
}
