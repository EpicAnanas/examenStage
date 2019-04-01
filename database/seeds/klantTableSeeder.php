<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\klant;

class klantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory('App\klant', 5)->create();

        DB::table('klants')->insert([
          'name' => 'Kevin'),
        ]);
    }
}
