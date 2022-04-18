<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //  DB::table('users')->insert([
      //   'role_id'=>'1',    
      //   'name'=> 'Md Admin',
      //   'username'=> 'admin',
      //   'email'=> 'admin@blog.com',
      //   'password'=> bcrypt('admin'),
        
      // ]);

      //  DB::table('users')->insert([
      //   'role_id'=>'2',    
      //   'name'=> 'Md Author',
      //   'username'=> 'author',
      //   'email'=> 'author@blog.com',
      //   'password'=> bcrypt('author'),
        
      // ]);

      DB::table('users')->insert([
        'role_id'=>'2',    
        'name'=> 'Sadia Uddin',
        'username'=> 'sadia123',
        'email'=> 'sadia@blog.com',
        'password'=> bcrypt('author'),
        'created_at' => date("Y-m-d H:i:s") ,
        
      ]);

       DB::table('users')->insert([
        'role_id'=>'2',    
        'name'=> 'Ziaul',
        'username'=> 'ziaul',
        'email'=> 'ziaul@blog.com',
        'password'=> bcrypt('author'),
        'created_at' => date("Y-m-d H:i:s") ,
        
      ]);
      DB::table('users')->insert([
        'role_id'=>'2',    
        'name'=> 'jamal',
        'username'=> 'jamal',
        'email'=> 'jamal@blog.com',
        'password'=> bcrypt('author'),
        'created_at' => date("Y-m-d H:i:s") ,
        
      ]);
      DB::table('users')->insert([
        'role_id'=>'2',    
        'name'=> 'era',
        'username'=> 'era',
        'email'=> 'era@blog.com',
        'password'=> bcrypt('author'),
        'created_at' => date("Y-m-d H:i:s") ,
        
      ]);
      
    }
}
