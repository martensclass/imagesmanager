<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use ImagesManager2\User;
use ImagesManager2\Album;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Model::unguard();

        //erase all data first;
        User::truncate();
        Album::truncate();

         $this->call(UserTableSeeder::class);
         $this->call(AlbumTableSeeder::class);

        Model::reguard();
    }
}
