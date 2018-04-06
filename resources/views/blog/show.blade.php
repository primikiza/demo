@extends('blog.template')

@section('main_content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
 
<div class="card-deck mb-3 text-center">
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">
              <a href="{{route('posts.show',['id'=>$post->id])}}">
                {{strtoupper($post->titre)}} - Le {{date_format($post->created_at,"d/m/Y")}}
              </a>
            </h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title" style="font-size:14px;">{{$post->user->email}}</small></h1>
            <p>
              {{$post->contenu}}
            </p>
            <button type="button" class="btn btn-lg btn-block btn-outline-primary">{{$post->user->name}}</button>
          </div>
        </div>
  </div>

    </div>

</div>
     
@stop