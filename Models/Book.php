<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    public $timestamps = false;
    protected $table = 'books';
    protected $fillable = ['author', 'name', 'pages', 'description', 'image'];

    public function addBook($data, $image_name)
    {
        $data += ['image' => $image_name];
        return Book::create($data);
    }

    public function bookList($page_limit)
    {
        return Book::paginate($page_limit);
    }

}
