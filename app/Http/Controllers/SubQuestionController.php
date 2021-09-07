<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\SubQuestion;
use Illuminate\Http\Request;

class SubQuestionController extends Controller
{
    public function create(Question $question)
    {
        return view('admin.sub_question.create',compact('question'));
    }

    public function store(Request $request,Question $question)
    {
        $data = $request->validate([
           'title'=>['required'],
           'is_answer' => ['nullable']
        ]);

        $question->SubQuestion()->create($data);

        return redirect()->route('questions.index');
    }

    public function edit(SubQuestion $sub_question)
    {
        return view('admin.sub_question.edit',compact('sub_question'));
    }

    public function update(SubQuestion $subQuestion,Request $request)
    {
        $data = $request->validate([
            'title'=>['required'],
            'is_answer' => ['nullable']
        ]);

        $subQuestion->update([
            'title'=>$data['title'],
            'is_answer' => $request->has('is_answer')
        ]);

        return redirect()->route('questions.index');

    }

    public function destroy(SubQuestion $subQuestion)
    {
        $subQuestion->delete();
        return back();
    }
}
