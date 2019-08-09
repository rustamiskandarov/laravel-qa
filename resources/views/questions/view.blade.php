@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-end">
                    <h4>{{$question->views}} Просмотров</h4>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex justify-content-between">
                            <h2>{{$question->title}}</h2>
                            <a class="btn btn-outline-secondary ml-auto" href="{{route('questions.index')}}">Назад ко всем вопросам</a>
                        </div>
                        <p>{!! $question->html !!}</p>
                    </div>
                </div>

            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3>{{$question->answers_count . " " . Str::plural('Ответ', $question->answers_count)}}</h3>
                        </div>
                        <hr>
                        @foreach($question->answers as $answer)
                            <div class="media mb-2">
                                <div class="media-body">
                                    <p>{!! $answer->html !!}</p>
                                    <div class="d-flex justify-content-end align-items-center">
                                        <span class="mr-2">{{$answer->create_date}}</span>
                                        <div class="media">
                                            <div class="mr-2">
                                                <img src="{{$answer->user->avatar}}" alt="{{$answer->user->name}}">
                                            </div>
                                            <div class="media-body">
                                                <a href="{{$answer->user->url}}">
                                                    {{$answer->user->name}}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection