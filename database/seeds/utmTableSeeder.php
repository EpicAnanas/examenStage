<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\utm;

class utmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory('App\utm', 10)->create();

      // DB::table('utms')->insert([
      //   'url' => Str::random(10),
      //   'source' => Str::random(10),
      //   'medium' => Str::random(10),
      //   'name' => Str::random(10),
      //   'term' => Str::random(10),
      //   'content' => Str::random(10),
      //   // 'link' => Str::random(10),
      //   'created_at' => Carbon::parse('1999-09-09'),
      //   'updated_at' => Carbon::parse('1999-09-09'),
      // ]);
    }
}
