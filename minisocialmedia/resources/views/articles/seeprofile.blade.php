@extends('layouts.app')


@section('content')
    <div class="row">

        @forelse($articles as $article)
            <div class="col-md-6 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span> This article was created  {{$article->created_at->diffForHumans()}} by {{$article->user->name}}</span>

                    </div>
                    <div class="panel-heading">

                        <div> Heading = {{$article->heading }}</div>
                    </div>
                    <div class="panel-body">

                        {{$article->content }}
                        <a href="/articles/{{$article->id}}" >Read More</a>
                    </div>
                    <div class="panel-footer clearfix">
                        @if($article-> user_id==Auth::id())
                            <form action="/articles/{{$article->id}}" method="POST"
                                  class="pull-right" style="margin-left:25px">
                                {{csrf_field()}}

                            </form>
                        @endif
                        <i>Mevasis Blog. Click
                            <a href=/home> here </a>
                        for the main page
                        </i>
                    </div>
                </div>
            </div>
    </div>
    @empty
        <div class="col-md-6 col-md-offset-2">
            No articles to show</div>
    @endforelse
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
{{$articles->links()}}
        </div>
    </div>
@endsection