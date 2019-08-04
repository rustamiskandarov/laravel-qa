@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h1>Ваш новый вопрос</h1>
                        <a class="btn btn-outline-secondary ml-auto" href="{{route('questions.index')}}">Назад ко всем вопросам</a>
                    </div>
                    <div class="card-body">
                        <form action="{{route('questions.store')}}" method="post">
                            @csrf
                            @include('layouts._form')
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection