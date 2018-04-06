@inject('services','App\Services\postsServices')
@extends('blog.template')

@section('main_content')

<?php $users_container =  $users; ?>

<?php foreach(array_chunk($users->items(), 3) AS $users): ?>
<div class="card-deck mb-3 text-center">
	@foreach ($users AS $user)
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">
            	<a href="{{route('posts.show',['id'=>$user->id])}}">
            		{{strtoupper($user->titre)}} - Le {{date_format($user->created_at,"d/m/Y")}}
            	</a>
            </h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title" style="font-size:14px;">{{$user->user->email}}</small></h1>
            <p>
            	{{$user->contenu}}
            </p>
            @if(auth()->user()&& $services->isOwner($user->user_id))
                <a href="{{route('posts.edit',['id'=>$user->id])}}" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
            @endif

            @if(auth()->user()&& auth()->user()->admin)
                {!! Form::open(['route'=>['posts.destroy',$user->id],'method'=>'delete']) !!}

                  {!!Form::submit('<i class="fa fa-edit"></i>',['class'=>'btn btn-danger','onclick'=>'return(confirm("Voulez vous vraiment supprimer cet article?"));'])!!}
                {!!Form::close()!!}
            @endif

            <button type="button" class="btn btn-lg btn-block btn-outline-primary">{{$user->user->name}}</button>
          </div>
        </div>
       @endforeach
  </div>
<?php endforeach; ?>

{{$users_container->render()}}
     
@stop