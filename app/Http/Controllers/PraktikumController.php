<?php

namespace App\Http\Controllers;

use App\Praktikum;
use App\Student;
use App\StudentTest;
use App\StudentTestItem;
use Illuminate\Http\Request;

class PraktikumController extends Controller
{
    /**
     * Show praktikum's materi
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function materi($id)
    {
        $praktikum = Praktikum::find($id);

        return view('mahasiswa.materi', compact('praktikum'));
    }

    /**
     * Show prakitkum's video
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function video($id)
    {
        $praktikum = Praktikum::find($id);

        return view('mahasiswa.video', compact('praktikum'));
    }

    /**
     * Show praktikum's soal
     * @param $id
     * @return mixed
     */
    public function ujian($id)
    {
        $praktikum = Praktikum::find($id);

        return view('mahasiswa.test', compact('praktikum'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function ujianPost($id, Request $request)
    {
        $studentTest = new StudentTest();
        $studentTest->test_code = date('YmdHis');
        $studentTest->student_id = auth()->user()->id;
        $studentTest->praktikum_id = $id;
        $studentTest->save();

        $items = $request->items;
        foreach ($items as $soalId => $answer) {
            $studentTestItem = new StudentTestItem();
            $studentTestItem->student_test_id = $studentTest->id;
            $studentTestItem->soal_id = $soalId;
            $studentTestItem->answer = $answer;
            $studentTestItem->save();
        }

        return redirect(route('praktikum.score', $id));
    }

    public function score($id)
    {
        $praktikum = Praktikum::find($id);
        $studentTest = Student::find(auth()->user()->id)->studentTest;

        return view('mahasiswa.score', compact('praktikum', 'studentTest'));
    }
}
