<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class liquidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=0;$i<100;$i++)
        {
            DB::table('liquid')->insert([
                'merek' => $faker->word(),
                'distributor' => $faker->word(),
                'stok' => $faker->randomNumber(5, false),
                'foto' => $faker->ipv4(),
            ]);
        }
    }
}
