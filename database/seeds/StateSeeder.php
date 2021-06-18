<?php

use App\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state = new State();
        $state->state_name = 'Molto attivo';
        $state->save();

        $state = new State();
        $state->state_name = 'Poco attivo';
        $state->save();

        $state = new State();
        $state->state_name = 'Non attivo';
        $state->save();

    }
}
