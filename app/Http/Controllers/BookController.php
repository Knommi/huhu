<?php

namespace App\Http\Controllers;

use Illuminate\Http\StoreOfficesRequest;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Resources\BookResource;
use DB;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show','get']);
    }

    public function get(){
    // step1
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle123456');
        } catch (RequestException $ex) {
            echo "not fdound";
            // abort(404, 'Github Repository not found');
        }
    
    
    // step2
        // try {
        //     $client = new \GuzzleHttp\Client();
        //     $response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle123456');
        // } catch (RequestException $ex) {
        //     throw new GithubAPIException('Github API failed in Offices Controller');
        // }
    }

    public function index()
    {
        return BookResource::collection(Book::with('ratings')->paginate(25));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rles=array(
            'title'=>'required|min:4|max:13',
            'description' => 'required|max:255',
        );
        $validator=Validator::make($request->all(),$rles);
        if($validator->fails()){
            return $validator->errors();
        }
        else{

            
            $book = Book::create([
                'user_id' => $request->user()->id,
                'title' => $request->title,
                'description' => $request->description,
            ]);
            
            return (new BookResource($book))->response()->setStatusCode(201);
            
        }
            
    }
    // ParseError: syntax error, unexpected token "}", expecting "," or ";" in file C:\xampp\htdocs\app\app\Http\Controllers\BookController.php on line 42

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $book=Book::findOrFail($id);
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upd(Request $request,$id)
    {

        echo $request->title;
        $book= Book::where('user_id',$request->user()->id)->get();
        if($book){
            Book::where('user_id',$request->user()->id)->where('id',$id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
            ]);
            // return new BookResource($book);
            echo $book[0]->title;
        }
        else{
                    echo  "mo soorry";

        }
          // check if currently authenticated user is the owner of the book
        //   if ($request->user()->id !== $book->user_id) {
        //     return response()->json(['error' => 'You can only edit your own books.'], 403);
          
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Book::where('id',$id)->delete();
        return response()->json(null, 204);
    }

    // BadMethodCallException: Method Illuminate\Database\Eloquent\Collection::update does not exist. in file C:\xampp\htdocs\app\vendor\laravel\framework\src\Illuminate\Macroable\Traits\Macroable.php on line 113

}
// Illuminate\Database\QueryException: SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'title' cannot be null (SQL: update `books` set `title` = ?, `description` = ?, `books`.`updated_at` = 2022-11-09 10:14:30 where `user_id` = 7 and `id` = 8) in file C:\xampp\htdocs\app\vendor\laravel\framework\src\Illuminate\Database\Connection.php on line 760
// ErrorException: Attempt to read property "id" on bool in file C:\xampp\htdocs\app\vendor\laravel\framework\src\Illuminate\Http\Resources\DelegatesToResource.php on line 139
