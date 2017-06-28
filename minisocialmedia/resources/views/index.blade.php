@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if(Auth::check())
                    Welcome to the main page of Mevasis Blog.
                        @else
                     Welcome!! This is the main page of the Mevasis Blog. You need to create an account to write freely in this site.
                        Click
                    <a href=/register>   here</a>
                        to create an account.
                        @endif
                </div>
            </div>
        </div>
        @forelse($articles as $article)
            <div class="col-md-6 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span> Created {{$article->created_at->diffForHumans()}} by <a href='{{action("ArticlesController@seeprofile",$article->user->id)}}'>{{$article->user->name}}</a></span>

                    </div>
                    <div class="panel-heading">

                        <div> Heading = {{$article->heading }}</div>
                    </div>
                    <div class="panel-body">
                        {{$article->shortContent }}
                        <a href="/articles/{{$article->id}}" >Read More</a>
                    </div>
                    <div class="panel-footer clearfix">
                        @if($article-> user_id==Auth::id())
                            <form action="/articles/{{$article->id}}" method="POST"
                                  class="pull-right" style="margin-left:25px">
                                {{csrf_field()}}

                            </form>
                        @endif
                        <i>Mevasis Blog </i>
                    </div>
                </div>
            </div>
    </div>
    @empty
        No articles
    @endforelse
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            {{$articles->links()}}
        </div>
    </div>
@endsection