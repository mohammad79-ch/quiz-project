<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('subQuestion')->get();
        return view('admin.questions.index',compact('questions'));
    }

    public function create()
    {
        return view('admin.questions.create');
    }

    public function show()
    {

    }

    public function store(Request $request)
    {
        $data = $request->validate([
           'title' => ['required']
        ]);

        $data['person_id']=1;

        Question::create($data);

        return redirect()->route('questions.index');
    }

    public function edit(Question $question)
    {
        return view('admin.questions.edit',compact('question'));
    }

    public function update(Request $request,Question $question)
    {
        $data = $request->validate([
            'title' => ['required']
        ]);

        $data['person_id']=1;

        $question->update($data);

        return redirect()->route('questions.index');
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return back();
    }
}
