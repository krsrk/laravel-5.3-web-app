<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
/**
* 
*/
class Post extends Model
{
	use Searchable;

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'posts_index';
    }
    
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