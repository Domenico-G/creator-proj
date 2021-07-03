<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkCreatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_creators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creator_id');
            $table->string('link_name');
            $table->string('link');
            $table->timestamps();

            $table->foreign('creator_id')
            ->references('id')
            ->on("creators");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('link_creators');
    }
}
