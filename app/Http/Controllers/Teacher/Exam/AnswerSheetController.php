<?php

namespace App\Http\Controllers\Teacher\Exam;

use App\Exam;
use App\Http\Controllers\Controller;
use App\Model\Marks\Marks;
use App\Student;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AnswerSheetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
        $this->middleware('teacher.profile');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $authTeacher = Auth::guard('teacher')->user();
        return view('teacher.exams.answer-sheet.index', compact('authTeacher'));
    }

    /**
     * Display the specified resource.
     *
     * @param $exam
     * @param $student
     * @return Application|Factory|RedirectResponse|View
     */
    public function show($exam, $student)
    {

        if ($this->validAnswerSheetRequest($exam, $student)) {
            $examId = Crypt::decrypt($exam);
            $studentId = Crypt::decrypt($student);


            $authTeacher = Auth::guard('teacher')->user();

            $exam = Exam::all()->find($examId);
            $student = Student::all()->find($studentId);
            $marks = $student->marks()->where('exam_id', $examId)->first();

            // Grammar
            $grammars = $exam->grammars()->where('set_id', $student->set->id)->get();

            // Vocabulary
            $synonyms = $exam->synonyms()->where('set_id', $student->set->id)->get();
            $definitions = $exam->definitions()->where('set_id', $student->set->id)->get();
            $combinations = $exam->combinations()->where('set_id', $student->set->id)->get();
            $fillInTheGaps = $exam->fillInTheGaps()->where('set_id', $student->set->id)->get();

            // Reading
            $headings = $exam->headings()->where('set_id', $student->set->id)->get();
            $rearrange = $exam->rearranges()->where(['set_id' => $student->set->id])->get()->first();
            $studentRearrange = $exam->studentRearranges()->where(['set_id' => $student->set->id, 'student_id' => $studentId])->get()->first();

            // Writing
            $studentDialog = $exam->studentDialogs()->where(['student_id' => $studentId])->get()->first();
            $studentInformalEmail = $exam->studentInformalEmails()->where(['student_id' => $studentId])->get()->first();
            $studentFormalEmail = $exam->studentFormalEmails()->where(['student_id' => $studentId])->get()->first();
            $studentSortQuestions = $exam->studentSortQuestions()->where(['student_id' => $studentId])->get();

            return view('teacher.exams.answer-sheet.show')
                ->with('authTeacher', $authTeacher)
                ->with('exam', $exam)
                ->with('student', $student)
                ->with('marks', $marks)

                ->with('grammars', $grammars)

                ->with('synonyms', $synonyms)
                ->with('definitions', $definitions)
                ->with('combinations', $combinations)
                ->with('fillInTheGaps', $fillInTheGaps)

                ->with('headings', $headings)
                ->with('rearrange', $rearrange)
                ->with('studentRearrange', $studentRearrange)

                ->with('studentDialog', $studentDialog)
                ->with('studentInformalEmail', $studentInformalEmail)
                ->with('studentFormalEmail', $studentFormalEmail)
                ->with('studentSortQuestions', $studentSortQuestions);

        } else {
            alert()->error('😒', 'You can\'t do this.');
            return redirect()->back();
        }
    }

    /**
     * @param Request $request
     * @param $exam
     * @param $student
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function dialogMarksSubmit(Request $request, $exam, $student)
    {
        if ($this->validAnswerSheetRequest($exam, $student)) {
            $examId = Crypt::decrypt($exam);
            $studentId = Crypt::decrypt($student);
            $authTeacher = Auth::guard('teacher')->user();

            $this->validate($request, [
               'dialogMarks' => 'required|integer'
            ]);

            $dialogMarks = Marks::where(['exam_id' => $examId, 'student_id' => $studentId])->get()->first();

            $dialogMarks->update(['dialog' => $request->input('dialogMarks')]);
            toast('Dialog marks has been successfully updated','success');
            session()->flash('success_audio');
            return redirect()->back();

        } else {
            alert()->error('😒', 'You can\'t do this.');
            return redirect()->back();
        }
    }


    /**
     * @param Request $request
     * @param $exam
     * @param $student
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function informalEmailMarksSubmit(Request $request, $exam, $student)
    {
        if ($this->validAnswerSheetRequest($exam, $student)) {
            $examId = Crypt::decrypt($exam);
            $studentId = Crypt::decrypt($student);
            $authTeacher = Auth::guard('teacher')->user();

            $this->validate($request, [
               'informalEmailMarks' => 'required|integer'
            ]);

            $dialogMarks = Marks::where(['exam_id' => $examId, 'student_id' => $studentId])->get()->first();

            $dialogMarks->update(['informalEmail' => $request->input('informalEmailMarks')]);
            toast('Informal Email marks has been successfully updated','success');
            session()->flash('success_audio');
            return redirect()->back();

        } else {
            alert()->error('😒', 'You can\'t do this.');
            return redirect()->back();
        }
    }


    /**
     * @param Request $request
     * @param $exam
     * @param $student
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function formalEmailMarksSubmit(Request $request, $exam, $student)
    {
        if ($this->validAnswerSheetRequest($exam, $student)) {
            $examId = Crypt::decrypt($exam);
            $studentId = Crypt::decrypt($student);
            $authTeacher = Auth::guard('teacher')->user();

            $this->validate($request, [
               'formalEmailMarks' => 'required|integer'
            ]);

            $marks = Marks::where(['exam_id' => $examId, 'student_id' => $studentId])->get()->first();

            $marks->update(['formalEmail' => $request->input('formalEmailMarks')]);
            toast('Formal Email marks has been successfully updated','success');
            session()->flash('success_audio');
            return redirect()->back();

        } else {
            alert()->error('😒', 'You can\'t do this.');
            return redirect()->back();
        }
    }


    /**
     * @param Request $request
     * @param $exam
     * @param $student
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function sortQuestionMarksSubmit(Request $request, $exam, $student)
    {
        if ($this->validAnswerSheetRequest($exam, $student)) {
            $examId = Crypt::decrypt($exam);
            $studentId = Crypt::decrypt($student);
            $authTeacher = Auth::guard('teacher')->user();

            $this->validate($request, [
               'sortQuestion' => 'required|integer'
            ]);

            $marks = Marks::where(['exam_id' => $examId, 'student_id' => $studentId])->get()->first();

            $marks->update(['sortQuestion' => $request->input('sortQuestion')]);
            toast('Sort question marks has been successfully updated','success');
            session()->flash('success_audio');
            return redirect()->back();

        } else {
            alert()->error('😒', 'You can\'t do this.');
            return redirect()->back();
        }
    }


    /**
     * @param $exam
     * @param $student
     * @return bool
     */
    private function validAnswerSheetRequest($exam, $student)
    {
        $authTeacher = Auth::guard('teacher')->user();
        $examId = Crypt::decrypt($exam);
        $studentId = Crypt::decrypt($student);


        $examRequestValid = false;
        $studentRequestValid = false;

        foreach ($authTeacher->exams as $exam) {
            if ($exam->id == $examId) {
                $examRequestValid = true;
            }
        }
        foreach ($authTeacher->students as $student) {
            if ($student->id == $studentId) {
                $studentRequestValid = true;
            }
        }
        return $examRequestValid === true && $studentRequestValid === true;
    }
}
