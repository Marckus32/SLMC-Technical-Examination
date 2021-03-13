<?php

namespace App\Http\Controllers;

use App\Albums;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AlbumsController extends Controller
{
    public function migration()
    {
        $albums = new Albums();
        $response = Http::get('https://jsonplaceholder.typicode.com/albums');        
        foreach($response->json() as $data) {
            $params = [
                'id'            => $data['id'],
                'user_id'       => $data['userId'],
                'title'          => $data['title'],
            ];            
            $albums::create($params);
        }
        echo "Albums Successfully Migrated\n";
    }

    public function result(Request $request)
    {
        $searchValue = $request->input('searchValue');
        $post = Albums::with('user')->whereHas('user',function($user) use ($searchValue){
            $user->where('name','like', '%' . $searchValue . '%');
        })
        ->where(function($query) use ($searchValue){
            $query->where('title', 'like', '%' . $searchValue . '%');
        });

        return $post->paginate(10);
    }
}
