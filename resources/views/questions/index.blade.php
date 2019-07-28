@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12">

                    <div class="card">
                        <div class="card-header">
                            <h1>Questions</h1>
                        </div>
                        <div class="card-body">
                            @foreach ($questions as $item)
                                <div class="media mb-2">
                                    <div class="media-body">
                                        <h3>{{$item->title}}</h3>
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