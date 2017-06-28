@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    You are seeing your articles. You can edit or delete your articles in this page.
                    You will be redirected to the main page of the blog , after you finish editing your articles.
                    Or you can just click
                    <a href=/home> here </a>
                    to go to main page.
                </div>
            </div>
        </div>
        @forelse($myarticles as $article)
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span>{{$article->created_at->diffForHumans()}}</span>
                    <span class="pull-right">
                         <small><a href="/articles/edit/{{$article->id}}">  (Edit)</a>
                        </small>
                        {{$article->created_at->diffForHumans()}}

                    </span>

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
                            {{method_field('DELETE')}}
                            <button class="btn btn-danger tn-sm">
                                Delete
                            </button>
                        </form>
                    @endif

                    <i class="left">Mevasis Blog </i>
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
{{$myarticles->links()}}
        </div>
    </div>
@endsection