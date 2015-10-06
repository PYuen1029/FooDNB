<?php

use Illuminate\Database\Seeder;
use App\Day;
use Carbon\Carbon;

class DaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// clear our database ------------------------------------------
        DB::table('days')->delete();

        // create some records
        $day1 = Day::create(array(
        	'activate_time' => Carbon::create(null, 9, 21, 7, 0, 0)
        ));

        $day2 = Day::create(array(
            'activate_time' => Carbon::create(null, 9, 23, 7, 0, 0)
        ));

        $day3 = Day::create(array(
            'activate_time' => Carbon::create(null, 9, 25, 7, 0, 0)
        ));

        $day4 = Day::create(array(
            'activate_time' => Carbon::create(null, 9, 27, 7, 0, 0)
        ));

        $day5 = Day::create(array(
            'activate_time' => Carbon::create(null, 9, 29, 7, 0, 0)
        ));

        $day6 = Day::create(array(
        	'activate_time' => Carbon::create(null, 10, 1, 7, 0, 0)
        ));

        $day7 = Day::create(array(
        	'activate_time' => Carbon::create(null, 10, 3, 7, 0, 0)
        ));

        $this->command->info('Days set up');

    }
}
