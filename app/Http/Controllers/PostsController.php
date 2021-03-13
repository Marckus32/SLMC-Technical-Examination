<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostsController extends Controller
{
    public function migration()
    {
        $post = new Posts();
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        foreach($response->json() as $data) {
            
            $params = [
                'id'            => $data['id'],
                'user_id'       => $data['userId'],
                'title'         => $data['title'],
                'body'          => $data['body'],
            ];
            $post::create($params);
        }
        echo "Posts Successfully Migrated\n";
    }

    public function result(Request $request)
    {
        $searchValue = $request->input('searchValue');
        // dd(Posts::with('user')->get());
        $post = Posts::with('user')->whereHas('user',function($user) use ($searchValue){
            $user->where('name','like', '%' . $searchValue . '%');
        })
        ->where(function($query) use ($searchValue){
            $query->where('title', 'like', '%' . $searchValue . '%')->orWhere('body', 'like', '%' . $searchValue . '%');
        });

        return $post->paginate(10);
    }

}
