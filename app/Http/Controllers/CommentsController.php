<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CommentsController extends Controller
{
    public function migration()
    {
        $comments = new Comments();
        $response = Http::get('https://jsonplaceholder.typicode.com/comments');        
        foreach($response->json() as $data) {
            $params = [
                'id'            => $data['id'],
                'post_id'       => $data['postId'],
                'name'          => $data['name'],
                'email'         => $data['email'],
                'body'          => $data['body'],
            ];            
            $comments::create($params);
        }
        echo "Comments Successfully Migrated\n";
    }
}
