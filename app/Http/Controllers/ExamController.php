<?php

namespace App\Http\Controllers;

use App\Exam;
use App\StudentExam;
use App\StudentExamItem;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $exam = Exam::find($id);

        return view('mahasiswa.pretest', compact('exam'));
    }

    public function submit(Request $request, $id)
    {
        $studentExam = auth()->user()->asStudent()->studentExams()->where('exam_id', $id)->first();

        foreach ($request->item as $soal => $answer) {
            $studentExamItem = $studentExam->items()->where('exam_item_id', $soal)->first();
            if (!$studentExamItem) {
                $studentExamItem = new StudentExamItem();
            }
            $studentExamItem->student_exam_id = $studentExam->id;
            $studentExamItem->exam_item_id = $soal;
            $studentExamItem->answer = $answer;
            $studentExamItem->save();
        }

        return redirect()->back();
    }
}
