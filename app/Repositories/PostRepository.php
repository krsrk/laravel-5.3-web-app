<?php

namespace App\Repositories;

use App\Post;

class PostRepository
{
    /**
     * Get all of the active post.
     *
     * @param  Post  $post
     * @return Collection
     */
    public function forPost(Post $post)
    {
        return $post->where('status', 1)
                    ->orderBy('created_at', 'desc')
                    ->get();
    }
    
    public function forPostById($id)
    {
        return Post::find($id);
    }
    
    public function insert($dataArr)
    {
        $result = false;
        $ins = Post::create($dataArr);

        if ($ins) {
            $result = true;
        }

        return $result;
    }
    
    public function update($post, $dataArr)
    {
        $result = false;
        
        $post->title = $dataArr['title'];
        $post->abstract = $dataArr['abstract'];
        $post->content = $dataArr['content'];
        
        $upd = $post->save();

        if ($upd) {
            $result = true;
        }

        return $result;
    }
    
    public function delete($post)
    {
        $result = false;
        
        $del = $post->delete();

        if ($del) {
            $result = true;
        }

        return $result;
    }
}
