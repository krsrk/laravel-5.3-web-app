<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* 
*/
class Post extends Model
{
	
    protected $table = 'post';

    protected $fillable = [
        'title',
        'abstract',
        'content',
        'created_at',
        'status'
    ];

    protected $guarded = [
        'id','updated_at'
    ];

    public function comments()
    {
        return $this->hasMany('App\PostComment', 'post_id');
    }
    
    public static function getFields()
    {
        return [
                    'title' => '',
                    'abstract' => '',
                    'content' => '',
                ];
    }
}