<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
            Users::create(['name'=>'admin', 'email'=>'admin@admin.com','phone'=>'01000000', 'password'=> bcrypt('admin')]);
        
    }
}
