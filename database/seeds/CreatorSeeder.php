<?php

use App\Creator;
use App\State;
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
        $stateArr = ['Virale', 'In tendenza', 'Abbandonato'];

        for ($i=0; $i < 7; $i++) {
            $state = new State();
            $state->state_name = $stateArr[rand(0, 2)];
            $state->save();

            $creator = new Creator;
            $creator->name = $faker->name();
            $creator->subtitle = $faker->sentence();
            $creator->description = $faker->paragraph();
            $creator->image = 'https://picsum.photos/id/' . rand(200, 300) . '/400/300';
            $creator->visible = true;
            $state->creator()->save($creator);
        }
    }
}
