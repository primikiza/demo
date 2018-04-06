
@include('blog.partials.addEdit',[
      
        'title'=>'Editer un article',
        'method'=>'put',
        'route'=>['posts.update',$post->id]
      ])