@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h1>Questions</h1>
                            <div class="ml-auto"><a class="btn btn-outline-secondary ml-auto" href="{{route('questions.create')}}">Ask Question</a></div>
                        </div>
                        @include('layouts._massage')
                        <div class="card-body">
                            @foreach ($questions as $item)
                                <div class="media mb-2">
                                    <div class="media-left flex-column mr-3">
                                        <div class="flex-column"><div class="text-center">{{$item->votes}}</div><div class="text-center"><small>Votes</small></div> </div>
                                        <div class="flex-column answers {{$item->status}}"><div class="text-center">{{$item->answers_count}}</div><div class="text-center"><small>Answers</small></div> </div>
                                        <div class="flex-column"><div class="text-center">{{$item->views}}</div><div class="text-center"><small>Views</small></div></div>
                                    </div>
                                    <div class="media-body">
                                        <div class="d-flex align-items-center">
                                            <h3><a href="{{$item->url}}">{{$item->title}}</a></h3>
                                            <div class="ml-auto">
                                                @can('update', $item)
                                                <a class="btn btn-outline-secondary mr-1" href="{{route('questions.edit', $item->id)}}">Edit</a>
                                                @endcan
                                            </div>
                                            @can('delete', $item)
                                                <form  action="{{route('questions.destroy', $item->id)}}" method="post">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button class="btn btn-outline-danger ml-auto" onclick="return confirm('Вы уверены')">Удалить</button>
                                                </form>
                                            @endcan
                                        </div>
                                        <p class="lead">
                                            Asked by
                                            <a href="{{$item->user->url}}">{{$item->user->name}}</a>
                                            <small class="text-muted">{{$item->createDate}}</small>
                                        </p>
                                        {{$item->bodyLimit()}}
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                                {{$questions->links()}}
                        </div>
                    </div>


            </div>
        </div>
    </div>
@endsection