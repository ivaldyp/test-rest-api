<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
        	'name_type' => 'Fantasy'
        ]);

        Tag::create([
        	'name_type' => 'Drama'
        ]);

        Tag::create([
        	'name_type' => 'Horror'
        ]);

        Tag::create([
        	'name_type' => 'Romance'
        ]);

        Tag::create([
        	'name_type' => 'Adventure'
        ]);
    }
}
