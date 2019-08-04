<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Model\Question;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('user')->latest()->paginate(10);
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question();
        return view('questions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request)
    {
        //dd($request->only('title', 'body'));
        $request->user()->questions()->create($request->only('title', 'body'));
        return redirect()->route('questions.index')->with('success', "Ваш вопрос сохранён"); //возвращаемся обратно
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question->views += 1;
        $question->save();
        return view('questions.view', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Model\Question $question
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Question $question)
    {
//        if(\Gate::denies('update-question', $question)){
//            abort(403, 'access-denied');
//        }
        $this->authorize("update", $question);
        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Model\Question $question
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(AskQuestionRequest $request, Question $question)
    {
//        if(\Gate::denies('update-question', $question)){
//            abort(403, 'access-denied');
//        }
        $this->authorize("update", $question);

        $question->update($request->only('title', 'body'));
        return redirect()->route('questions.index')->with('success', "Ваш вопрос успешно изменён");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Model\Question $question
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function destroy(Question $question)
    {
//        if(\Gate::denies('delete-question', $question)){
//            abort(403, 'access-denied');
//        }
        $this->authorize("delete", $question);
        $question->delete();
        return redirect('/questions')->with('success', "Запись успешно удалена");
    }
}
