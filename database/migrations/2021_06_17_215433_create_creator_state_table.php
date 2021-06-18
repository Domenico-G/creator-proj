<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreatorStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creator_state', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')
            ->references('id')
            ->on("states");

            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id')
            ->references('id')
            ->on("creators");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creator_state');
    }
}
