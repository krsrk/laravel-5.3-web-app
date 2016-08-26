<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* 
*/
class PostComment extends Model
{
	
    protected $table = 'post_comment';

    protected $fillable = [
            'comment',
            'created_at',
            'status'
    ];

    protected $guarded = [
            'id','post_id','updated_at'
    ];

    public function post()
    {
            return $this->belongsTo('App\Post', 'post_id');
    }
}
