<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;

class MainController extends Controller
{
    public function index()
    {
        return view('home', [
        ]);
    }

    public function addBook(Request $request)
    {

        $this->validate($request, [
            'author' => 'required|string|max:30',
            'name' => 'required|string|max:50',
            'pages' => 'required|integer',
            'description' => 'required|string|max:1000',
            'image' => 'image|max: 200'
        ]);

        $image_name = $this->uploadImage($request);
        $data = $request->all();

     /*   echo "<pre>";
        var_dump($data);
        die();*/

        $bookModel = new Book();
        $res = $bookModel->addBook($data, $image_name);

        if (!$res ) {
            die('Database error! New item was not created!');
        }

        return redirect()->route('home');

    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('input_image')) {
            if($request->file('input_image')->isValid()) {

                $img = $request->file('input_image');
                $ext = $img->getClientOriginalExtension();
                $image_resize = Image::make($img)->resize(200, 250);
                $image_name = time().'.'.$ext;
                $image_resize->save(public_path('images') . '/' . $image_name);
                return $image_name;
            }
        }
    }

    public function bookList()
    {
        $bookModel = new Book();
        $books = $bookModel->bookList(3);

        if (!$books) {
            echo "Books not found";
        }

        return view('list', [
            'books' => $books
        ]);
    }

}



