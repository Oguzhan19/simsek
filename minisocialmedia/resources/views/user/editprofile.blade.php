@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Your Profile
                </div>

                <div class="panel-body">
                    <form action="/user/{{$user->id}}" method="post">
                        {{method_field('put')}}
                        {{csrf_field()}}

                        <input type="hidden" name="username"
                               value="{{Auth::user()->username}}">

                        <div class="form-group">
                            <label for="username">Username</label>
                            <textarea name="text" class="form-control">
                                  {{$user->username}}
                        </textarea>
                        </div>

                        <input type="submit" class="btn btn-success pull-right">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection