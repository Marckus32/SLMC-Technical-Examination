<?php

namespace App\Http\Controllers;

use App\Todos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TodosController extends Controller
{
    public function migration()
    {
        $todos = new Todos();
        $response = Http::get('https://jsonplaceholder.typicode.com/todos');        
        foreach($response->json() as $data) {
            $params = [
                'id'            => $data['id'],
                'user_id'       => $data['userId'],
                'title'         => $data['title'],
                'completed'     => $data['completed'] == false ? 0 : 1,
            ];      
            $todos::create($params);
        }
        echo "Albums Successfully Migrated\n";
    }
}
