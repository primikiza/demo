@extends('blog.template')

@section('main_content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
 
        <div class="card text-center">
          <div class="card-header">
            {{$title}}
          </div>
          <div class="card-body">

            <?php 
                $valid_title    = $errors->has('titre') ? ' is-invalid' : '' ;
                $valid_content  = $errors->has('contenu') ? ' is-invalid' : '' ;
                $value_title    = old('titre')??$post->titre;
                $value_content  = old('contenu')??$post->contenu;
            ?>

            {!! Form::open(['route'=>$route,'method'=>$method]) !!}

                    <div class="form-group row">
                      {!!Form::label('titre','Votre titre',['class'=>'col-sm-3 col-form-label']) !!}
                      <div class="col-sm-9">
                        {!! Form::text('titre',$value_title,['class'=>'form-control '.$valid_title,'placeholder'=>'Entrer le titre','required'=>'required']) !!}
                        {!!$errors->first('titre',' <div class="invalid-feedback">:message</div>') !!}
                      </div>
                    </div>


                    <div class="form-group row {{ $errors->has('contenu') ? 'is-invalid' : '' }}">
                      {!!Form::label('contenu','Votre contenu',['class'=>'col-sm-3 col-form-label']) !!}
                      <div class="col-sm-9">
                          {!! Form::textarea('contenu',$value_content,['class'=>'form-control '.$valid_content,'placeholder'=>'Entrer le contenu','required'=>'required','value'=>$value_content]) !!}
                          {!! $errors->first('contenu',' <div class="invalid-feedback">:message</div> ')!!}
                      </div>
                    </div>


                  <div class="col-sm-9 offset-sm-3">
                     {!! Form::submit('Enregistrer',['class'=>'btn btn-success btn-block'])!!}
                  </div>  


            {!! Form::close() !!}

          </div>
          <div class="card-footer">
              <div class="pull-left">
                
               <a href="{{route('posts.index')}}" class="btn btn-primary"> <i class="fa fa-arrow-alt-circle-left"></i>Posts</a>
              </div>
          </div>
        </div>
    </div>

</div>
     
@stop