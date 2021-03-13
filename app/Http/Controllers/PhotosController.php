<?php

namespace App\Http\Controllers;

use App\Photos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PhotosController extends Controller
{
    public function migration()
    {
        $photos = new Photos();
        $response = Http::get('https://jsonplaceholder.typicode.com/photos');        
        foreach($response->json() as $data) {
            $params = [
                'id'             => $data['id'],
                'album_id'       => $data['albumId'],
                'title'          => $data['title'],
                'url'            => $data['url'],
                'thumbnailUrl'   => $data['thumbnailUrl'],
            ];       
            $photos::create($params);
        }
        echo "Photos Successfully Migrated\n";
    }
}
