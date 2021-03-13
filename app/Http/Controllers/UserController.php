<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function migration()
    {
        $user = new User();
        $response = Http::get('https://jsonplaceholder.typicode.com/users');
        foreach($response->json() as $data) {
            
            $params = [
                'id'                    => $data['id'],
                'name'                  => $data['name'],
                'username'              => $data['username'],
                'email'                 => $data['email'],
                'street'                => $data['address']['street'],
                'suite'                 => $data['address']['suite'],
                'city'                  => $data['address']['city'],
                'zipcode'               => $data['address']['zipcode'],
                'geo_lat'               => $data['address']['geo']['lat'],
                'geo_lang'              => $data['address']['geo']['lng'],
                'phone'                 => $data['phone'],
                'website'               => $data['website'],
                'company_name'          => $data['company']['name'],
                'company_catchPhrase'   => $data['company']['catchPhrase'],
                'company_bs'            => $data['company']['bs'],                
            ];
            $user::create($params);
        }
        echo "Users Successfully Migrated\n";
    }

    public function result(Request $request)
    {
        $searchValue = $request->input('searchValue');

        $user = User::where(function($query) use ($searchValue){
            $query
                ->where('name', 'like', '%' . $searchValue . '%')
                ->orWhere('username', 'like', '%' . $searchValue . '%')
                ->orWhere('email', 'like', '%' . $searchValue . '%')
                ->orWhere('street', 'like', '%' . $searchValue . '%')
                ->orWhere('suite', 'like', '%' . $searchValue . '%')
                ->orWhere('city', 'like', '%' . $searchValue . '%')
                ->orWhere('zipcode', 'like', '%' . $searchValue . '%');
        });
        return $user->paginate(5);
    }

    public function posts()
    {
        
    }
}
