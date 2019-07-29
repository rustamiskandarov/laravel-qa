@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <h1>Questions</h1>
                        </div>
                        <div class="card-body">
                            @foreach ($questions as $item)
                                <div class="media mb-2">
                                    <div class="media-left flex-column mr-3">
                                        <div class="flex-column"><div class="text-center">{{$item->votes}}</div><div class="text-center"><small>Votes</small></div> </div>
                                        <div class="flex-column answers {{$item->status}}"><div class="text-center">{{$item->answers}}</div><div class="text-center"><small>Answers</small></div> </div>
                                        <div class="flex-column"><div class="text-center">{{$item->views}}</div><div class="text-center"><small>Views</small></div></div>
                                    </div>
                                    <div class="media-body">
                                        <h3><a href="{{$item->url}}">{{$item->title}}</a></h3>
                                        <p class="lead">
                                            Asked by
                                            <a href="{{$item->user->url}}">{{$item->user->name}}</a>
                                            <small class="text-muted">{{$item->createDate}}</small>
                                        </p>
                                        <div>
                                            {{$item->bodyLimit()}}
                                        </div>
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