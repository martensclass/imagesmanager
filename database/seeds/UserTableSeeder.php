<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use ImagesManager2\User;
class UserTableSeeder extends Seeder
{
   
    public function run()
    {
     
    for($i=1; $i<50; $i++)
    {
        User::create
        (
            [
                'name' => "User $i",
                'email' => "user$i@users.com",
                'password' => bcrypt('pass'), 
                'question' => 'quest',
                'answer' => bcrypt('answer')
            ]
        );
    }

    }
}
