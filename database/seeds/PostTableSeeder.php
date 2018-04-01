<?php

use Illuminate\Database\Seeder;
use Carbon\carbon;
class PostTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();

        for($i=1;$i<=100;$i++){
            $date = $this->randDate();
            DB::table('posts')->insert(
                [
                    'titre'=>'title'.$i,
                    'contenu'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'.$i,
                    'user_id'=>rand(1,10),
                    'created_at'=>$date,
                    'updated_at'=>$date,

                ]
            );            
        }

    }


     private function randDate(){
        return Carbon::createFromDate(rand(2017,2018), rand(1,12), rand(1,28));
    }
}
