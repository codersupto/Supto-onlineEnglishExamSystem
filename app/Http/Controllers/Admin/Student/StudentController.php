<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Student\StudentCreateRequest;
use App\Http\Requests\Admin\Student\UpdateStudentRequest;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.student.index')
            ->with('students', Student::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StudentCreateRequest $request
     * @param Student $student
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(StudentCreateRequest $request)
    {
        $student = new Student();

        $data = $request->only('name', 'email', 'password');
        $data['id_number'] = now('asia/dhaka')->format('msms');

        $student->create($data);
        toast('Student was added successfully!','success');
        session()->flash('success_audio');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Student $student
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Student $student)
    {
        return view('admin.student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Student $student
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Student $student)
    {
        return view('admin.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Student $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->only('name', 'email');
        if ($request->password != null ) {
            $data['password'] = $request->password;
        }

        $student->update($this->validateUpdateStudentRequest($request));
        toast('Student was updated successfully!','success');
        session()->flash('success_audio');
        return redirect()->route('admin.students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Student $student
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Student $student)
    {
        $student->delete();
        toast('Student was deleted successfully!','success');
        session()->flash('success_audio');
        return redirect()->route('admin.students.index');

    }

    protected function validateUpdateStudentRequest($request) {
        $validateData = $this->validate($request, [
            'name' => 'required|max:255|string',
            'email' => 'required|max:255|email',
        ]);

        if ($request->password != null) {
            $validatePassword = $this->validate($request, [
                'password' => 'required|max:255|min:6|confirmed',
            ]);

            $validateData = array_merge($validateData, $validatePassword);
        }

        return $validateData;
    }
}
