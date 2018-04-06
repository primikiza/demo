<?php 

namespace App\Http\Repositories;
use Illuminate\Http\Request;
use App\Post;

class postsRepository{

	protected $post;
	protected $request;
	protected $_instance;

	public function __construct(Post $post, Request $request){
			$this->post = $post;
			$this->request = $request;
	}


	public function paginate($numberPerpage){
		return $this->post::with('user')->orderBy('id','DESC')->paginate($numberPerpage);
	}

	public function show($id){

		return $this->post->with('user')->findOrFail($id);

	}


	public function create(Array $data){
			return $this->post->create($data);
	}

	public function showForm(){
		$post = $this->post;
		return view('blog.create',compact('post'));
	}


	public function edit ($id){
		if($this->isOwner($id)){
			$post = $this->getById($id);
			return view('blog.edit',compact('post'));
		}
		return back()->with(['message'=>'Vous avez pas droit aux modifications','type'=>'danger']);
	}


	public function update($request, $id){

		if(!$this->isOwner($id)){
			return back()->with(['message'=>'Vous avez pas droit aux modifications','type'=>'danger']);
		}

		$post = $this->getById($id);
		$post->titre = $request->titre;	
		$post->contenu = $request->contenu;
		$post->update();

		return redirect('posts/'.$id)->with(['message'=>'Le post a ete modifié avec succes','type'=>'success']);
		
	}


	public function destroy($id){
		$post = $this->getById($id);
		$post->delete();
		return back()->with(['message'=>'Votre Post a ete supprimE avec success','type'=>'danger']);
	}



	private function getById($id){
		if(!$this->_instance){
			$this->_instance = $this->post->findOrFail($id);	
		}

		return $this->_instance;
		
	}

	private function isOwner($id){
		$id_user_connected = $this->request->user()->id;
		$post  = $this->getById($id);
		$id_post_user= $post->user_id;
		return ($id_post_user == $id_user_connected);

	}


}