<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\postsRepository;
use App\Http\Requests\createUpdatePostRequest;

class postsController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $posts_per_page = 6;
    protected $repository; 

    public function __construct(postsRepository $repository){
        $this->middleware('auth',['except'=>['index','show']]);
        $this->middleware('admin',['only'=>['destroy']]);
        $this->repository = $repository;
    }   


    public function index()
    {
        $users = $this->repository->paginate($this->posts_per_page);
        return view('blog.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return $this->repository->showForm();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createUpdatePostRequest $request)
    {

        $data = array_merge($request->all(),['user_id'=>$request->user()->id]);
        $this->repository->create($data);
        return redirect('/posts')->with(['message'=>'Le post a ete ajoute avec succes','type'=>'danger']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->repository->show($id);
        return view('blog.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      return $this->repository->edit($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(createUpdatePostRequest $request, $id)
    {
        return $this->repository->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       return $this->repository->destroy($id);
    }
}
