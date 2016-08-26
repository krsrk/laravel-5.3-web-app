<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Post;
use App\Repositories\PostRepository;
use Auth;

class AdminController extends Controller
{

    protected $data;
    protected  $repo;
    
    public function __construct(PostRepository $post)
    {
        $this->data = $post->forPost(new Post());
        $this->repo = $post;
    }

    public function index()
    {
        return view('admin', ['data' => $this->data]);
    }
    
    public function store(Request $request)
    {
        $message = '';
        if ($request->isMethod('post')) {
            $fields = Post::getFields();
            $fields['title'] = $request->get('title');
            $fields['abstract'] = $request->get('abstract');
            $fields['content'] = $request->get('content');
            
            $ins = $this->repo->insert($fields);
            
            if ($ins) {
                $message = 'Post was inserted successfully';
            } else {
                $message = 'Something went wrong, try again later';
            }
            
            return view('admin-post', ['message' => $message]);
        } else {
            return view('admin-post', ['message' => $message]);
        }
    }
    
    public function update(Request $request, $id = null)
    {
        $message = '';
        $postId = (is_null($id)) ? $request->get('postId') : $id;
        $post = $this->repo->forPostById($postId);
        
        if ($request->isMethod('put')) {
            $fields = Post::getFields();
            $fields['title'] = $request->get('title');
            $fields['abstract'] = $request->get('abstract');
            $fields['content'] = $request->get('content');
            
            $upd = $this->repo->update($post, $fields);
            
            if ($upd) {
                $message = 'Post was updated successfully';
            } else {
                $message = 'Something went wrong, try again later';
            }
            
            return view('admin-post-update', ['message' => $message, 'data' => $post]);
        } else {
            return view('admin-post-update', ['message' => $message, 'data' => $post]);
        }
    }
    
    public function delete(Request $request)
    {
        if ($request->isMethod('delete')) {
            $post = $this->repo->forPostById($request->get('postId'));
            $del = $this->repo->delete($post);
            
            $data = $this->repo->forPost(new Post());
            
            if ($del) {
                $message = 'Post was deleted successfully';
            } else {
                $message = 'Something went wrong, try again later';
            }
            
            return view('admin', ['message' => $message, 'data' => $data]);
        } 
    }
}
