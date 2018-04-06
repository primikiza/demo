@include('blog.partials.addEdit',
[
  'title'=>'Ajouter un article',
  'method'=>'post',
  'route'=>['posts.store'],
]
)