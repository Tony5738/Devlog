<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{

    private function randDate()
    {
        return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->delete();
        for($i = 0; $i < 20; ++$i)
        {
            $date = $this->randDate();
            DB::table('tags')->insert(array(
                'tag' => 'tag' . $i,
                'tag_url' => 'tag' . $i,
                'created_at' => $date,
                'updated_at' => $date
            ));
        }
    }
}
