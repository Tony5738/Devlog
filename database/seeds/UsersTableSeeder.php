<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        for($i = 0;$i<100;++$i)
        {
            DB::table('users')->insert([
                'name' => 'Name'.$i,
                'email'=>'email'.$i.'@gmail.com',
                'password' => bcrypt('password' . $i),
                'position' => 'job'.$i,
                'role_id' => rand(1,2),

            ]);
        }
    }
}
