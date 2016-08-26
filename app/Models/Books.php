<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'guid',
        'author',
        'title',
        'description',
        'abstract',
        'edition',
        'publish_date',
        'status']; 
}
