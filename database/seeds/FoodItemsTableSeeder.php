<?php

use Illuminate\Database\Seeder;
use App\FoodItem;
use App\Day;

class FoodItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('foodItems')->delete();

        // create some records
        $wheatBread = FoodItem::create(array(
        	'name' => 'Whole wheat bread',
        	'day_id' => App\Day::where('activate_time','2015-09-21 07:00:00')->first()->id,
        	'quantity' => 3,
        	'claimed' => 0
        ));

        $watermelon = FoodItem::create(array(
        	'name' => 'Watermelon',
            'day_id' => App\Day::where('activate_time','2015-09-25 07:00:00')->first()->id,
        	'quantity' => 1,
        	'claimed' => 0
        ));

        $redPepper = FoodItem::create(array(
        	'name' => 'Red Pepper',
            'day_id' => App\Day::where('activate_time','2015-09-23 07:00:00')->first()->id,
        	'quantity' => 2,
        	'claimed' => 3
        ));

        $squash = FoodItem::create(array(
            'name' => 'Squash',
            'day_id' => App\Day::where('activate_time','2015-09-21 07:00:00')->first()->id,
            'quantity' => 2,
            'claimed' => 1
        ));

        $linguini = FoodItem::create(array(
            'name' => 'Linguini',
            'day_id' => App\Day::where('activate_time','2015-09-23 07:00:00')->first()->id,
            'quantity' => 1,
            'claimed' => 3
        ));

        $spaghetti = FoodItem::create(array(
            'name' => 'Spaghetti',
            'day_id' => App\Day::where('activate_time','2015-09-23 07:00:00')->first()->id,
            'quantity' => 2,
            'claimed' => 0
        ));

        $blackolive = FoodItem::create(array(
      		'name' => 'Black Olives',
            'day_id' => App\Day::where('activate_time','2015-10-1 07:00:00')->first()->id,
        	'quantity' => 2,
        	'claimed' => 1
        ));

        $linguini = FoodItem::create(array(
            'name' => 'Linguini',
            'day_id' => App\Day::where('activate_time','2015-10-3 07:00:00')->first()->id,
            'quantity' => 1,
            'claimed' => 3
        ));

        $spaghetti = FoodItem::create(array(
            'name' => 'Spaghetti',
            'day_id' => App\Day::where('activate_time','2015-9-27 07:00:00')->first()->id,
            'quantity' => 2,
            'claimed' => 0
        ));
 
        $this->command->info('FoodItems are set up');
    }
}
