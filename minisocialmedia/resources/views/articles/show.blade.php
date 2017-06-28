@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">

                    <span>
                      This article was created {{$article->created_at->diffForHumans()}} by {{$article->user->name}}
                    </span>

                </div>
                <div class="panel-heading">

                    <div> Heading = {{$article->heading }}</div>
                </div>
                <div class="panel-body">
                  {{$article->content}}
                </div>
                <div class="panel-footer clearfix">

                    <a href=/seeprofile/show/{{$article->user->id}}>
                        << Go to the profile of {{$article->user->name}} </a>
                    <a href=/home  class="pull-right">Go to the main page of Mevasis Blog>> </a>
                </div>
            </div>
        </div>
    </div>
@endsection