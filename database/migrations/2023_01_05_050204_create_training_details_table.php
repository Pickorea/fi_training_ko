<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_details', function (Blueprint $table) {
            $table->id();
            $table->integer('village_id');
            $table->integer('training_id');
            $table->string('participant_first_name');
            $table->string('participant_last_name');
            $table->integer('age');
            $table->string('gender', 1);
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
        Schema::dropIfExists('training_details');
    }
}
