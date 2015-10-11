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
        	'day_id' => App\Day::where('activate_time', '=', '2015-09-21 07:00:00')->first()->id,
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

        $pumpkin = FoodItem::create(array(
            'name' => 'Pumpkin',
            'day_id' => App\Day::where('activate_time','2015-10-3 07:00:00')->first()->id,
            'quantity' => 2,
            'claimed' => 1
        ));

        $beer = FoodItem::create(array(
            'name' => 'Beer',
            'day_id' => App\Day::where('activate_time','2015-9-29 07:00:00')->first()->id,
            'quantity' => 1,
            'claimed' => 0
        ));

        $granola = FoodItem::create(array(
            'name' => 'Granola',
            'day_id' => App\Day::where('activate_time','2015-10-3 07:00:00')->first()->id,
            'quantity' => 7,
            'claimed' => 0
        ));

        $apple = FoodItem::create(array(
            'name' => 'Apples',
            'day_id' => App\Day::where('activate_time','2015-10-1 07:00:00')->first()->id,
            'quantity' => 2,
            'claimed' => 1
        ));

        $icies = FoodItem::create(array(
            'name' => 'Icies',
            'day_id' => App\Day::where('activate_time','2015-10-3 07:00:00')->first()->id,
            'quantity' => 2,
            'claimed' => 3
        ));

        $giantmango = FoodItem::create(array(
            'name' => 'Giant Mango',
            'day_id' => App\Day::where('activate_time','2015-9-27 07:00:00')->first()->id,
            'quantity' => 1,
            'claimed' => 0
        ));

        $worchester = FoodItem::create(array(
            'name' => 'Worcester Sauce',
            'day_id' => App\Day::where('activate_time','2015-09-29 07:00:00')->first()->id,
            'quantity' => 0,
            'claimed' => 0
        ));

        $pineseeds = FoodItem::create(array(
      		'name' => 'Pine Seeds',
            'day_id' => App\Day::where('activate_time','2015-10-1 07:00:00')->first()->id,
        	'quantity' => 2,
        	'claimed' => 1
        ));

        $honey = FoodItem::create(array(
            'name' => 'Honey',
            'day_id' => App\Day::where('activate_time','2015-10-3 07:00:00')->first()->id,
            'quantity' => 11,
            'claimed' => 3
        ));

        $eggs = FoodItem::create(array(
            'name' => 'Eggs',
            'day_id' => App\Day::where('activate_time','2015-9-29 07:00:00')->first()->id,
            'quantity' => 2,
            'claimed' => 0
        ));
 
        $this->command->info('FoodItems are set up');
    }
}
