<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use ImagesManager2\User;
use ImagesManager2\Album;

class AlbumTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        foreach($users as $user)
        {
            $number = mt_rand(1,5);

            for($i=1; $i < $number; $i++)
            {
                Album::create
                (
                    [  
                    'title' => "Album $i for user $user->id",
                    'description' => "Some album description",
                    'user_id' => $user->id 
                    ]
                );
            }

        }
    }
}
