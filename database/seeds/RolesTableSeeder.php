<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{

    private function randDate(){
        return Carbon::createFromDate(null, rand(1,12),rand(1,28));
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();



        $date = $this->randDate();
        DB::table('roles')->insert([
            'role' => 'admin',
            'created_at' =>$date,
            'updated_at' => $date
        ]);

        $date = $this->randDate();
        DB::table('roles')->insert([
            'role' => 'guest',
            'created_at' =>$date,
            'updated_at' => $date
        ]);

    }
}
