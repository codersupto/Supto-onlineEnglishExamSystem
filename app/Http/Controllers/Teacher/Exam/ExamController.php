<?php

namespace App\Http\Controllers\Teacher\Exam;

use App\Exam;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\Exam\ExamCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
        $this->middleware('teacher.profile');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

//        foreach (Exam::find(1)->sets as $set) {
//            echo $set->name . ' ' . $set->grammarQuestions()->count() . ', ';
//        };

        return view('teacher.exams.index')
            ->with('exams', Exam::latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('teacher.exams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ExamCreateRequest $request)
    {
        $data = $request->only('name');
        $data['slug'] = Str::slug($request->name);
        Auth::guard('teacher')->user()->exams()->create($data);

        toast('Exam has been successfully added','success');
        session()->flash('success_audio');
        return redirect()->route('teacher.exams.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Exam $exam)
    {
        return view('teacher.exams.show', compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Exam $exam)
    {
        return view('teacher.exams.edit', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Exam $exam)
    {
        $exam->update($this->validateUpdateExamRequest($request));
        toast('Exam has been successfully updated','success');
        session()->flash('success_audio');
        return redirect()->route('teacher.exams.index');
    }

    public function status(Request $request, Exam $exam)
    {
        if ($request->status === 'running') {
            $exam->update(['status' => 'running']);
            toast('Exam has been successfully running','success');
            session()->flash('success_audio');
        } elseif ($request->status === 'complete') {
            $exam->update(['status' => 'complete']);
            toast('Exam has been successfully completed','success');
            session()->flash('success_audio');
        } elseif ($request->status === 'cancel') {
            $exam->update(['status' => 'cancel']);
            toast('Exam has been successfully canceled','success');
            session()->flash('success_audio');
        } elseif ($request->status === 'complete') {
            $exam->update(['status' => 'complete']);
            toast('Exam has been successfully completed','success');
            session()->flash('success_audio');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Exam $exam)
    {
        $exam->forceDelete();
        toast('Exam has been successfully deleted','success');
        session()->flash('success_audio');
        return redirect()->route('teacher.exams.index');
    }

    protected function validateUpdateExamRequest($request) {
        $validateData = $this->validate($request, [
            'name' => 'required|max:255|string|unique:exams',
        ]);

        return [
            'teacher_id' => Auth::guard('teacher')->user()->id,
            'name' => $validateData['name'],
            'slug' => Str::slug($validateData['name']),
        ];
    }

}