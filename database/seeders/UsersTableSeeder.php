<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create(['username'=>'dmmkimani', 'email'=>'dmmk@app.com', 'admin'=>false]);
        User::factory(1)->create(['username'=>'admin', 'email'=>'admin@app.com', 'admin'=>true]);
        User::factory(98)->create();
    }
}
