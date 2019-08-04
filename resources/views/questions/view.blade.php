@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4>{{$question->views}}</h4>
                <h3>{{$question->title}}</h3>
                <p>{!! $question->html !!}</p>
                <a class="btn btn-outline-secondary ml-auto" href="{{route('questions.index')}}">Назад ко всем вопросам</a>
            </div>
        </div>
    </div>
@endsection