@extends('layouts.app')
<style type="text/css">
    .profile-img{
        max-width:150px;
        border:5px solid #fff;
        border-radius:100%;
        box-shadow:0 2px 2px rgba(0,0,0,0.3);
    }
</style>
@section('content')

    <div class="row">
       <div class="col-md-6 col-md-offset-3">
          <div class="panel panel default">
              <div class="panel-body text-center">
               <img class="profile-img" src="http://www.newsshare.in/wp-content/uploads/2017/04/Miniclip-8-Ball-Pool-Avatar-16.png">


              <h5>{{$user->email}}</h5>
              <h5>{{$user->dob->format('l j F Y')}}({{$user->dob->age}}years old)</h5>
                  <span>
                      <small><a href="/profile/edit/{{$user->id}}">Edit</a>
                      </small>
                  </span>
              </div>

              <div class="panel-body">

              </div>
                  </button>
                  </span>
              </div>
          </div>
       </div>
    </div>

@endsection