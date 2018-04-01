<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        for($i=1;$i<=10;$i++){
            DB::table('users')->insert(
                [
                    'id'=>$i,
                    'name'=>'name'.$i,
                    'email'=>'email'.$i.'@example.com',
                    'password'=>bcrypt('123456'),
                    'admin'=>rand(0,1)
                ]
            );            
        }

    }
}
