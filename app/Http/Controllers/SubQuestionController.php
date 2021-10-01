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
        ]);

        $this->createSubQuestion($question, $data['title'], $request);

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
        ]);

        $this->updateSubQuestion($subQuestion, $data['title'], $request);

        return redirect()->route('questions.index');

    }

    public function destroy(SubQuestion $subQuestion)
    {
        $subQuestion->delete();
        return back();
    }

    /**
     * @param Question $question
     * @param $title
     * @param Request $request
     */
    public function createSubQuestion(Question $question, $title, Request $request): void
    {
        $question->SubQuestion()->create([
            'title' => $title,
            'is_answer' => $request->has('is_answer')
        ]);
    }

    /**
     * @param SubQuestion $subQuestion
     * @param $title
     * @param Request $request
     */
    public function updateSubQuestion(SubQuestion $subQuestion, $title, Request $request): void
    {
        $subQuestion->update([
            'title' => $title,
            'is_answer' => $request->has('is_answer')
        ]);
    }
}
