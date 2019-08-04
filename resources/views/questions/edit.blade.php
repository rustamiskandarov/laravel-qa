@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3>Редактирование вашего вопроса</h3>
                        <div class="ml-auto">
                            <a class="btn btn-outline-secondary" href="{{route('questions.index')}}">Назад к вопросам</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('questions.update', $question->id)}}" method="post">
                            {{method_field('PUT')}}
                            @csrf
                            @include('layouts._form')
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection