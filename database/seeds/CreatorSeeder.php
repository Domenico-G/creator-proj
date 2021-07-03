<?php

use App\Creator;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CreatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($i=0; $i < 10; $i++) {

            $creator = new Creator;
            $creator->name = $faker->name();
            $creator->subtitle = $faker->sentence();
            $creator->description = $faker->paragraph();
            $creator->image = 'https://picsum.photos/id/' . rand(200, 300) . '/400/300';
            $creator->visible = true;
            $creator->save();
            $creator->state()->attach(rand(1,3));
        }
    }
}
