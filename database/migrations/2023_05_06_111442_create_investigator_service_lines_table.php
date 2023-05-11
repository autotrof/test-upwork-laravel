<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigator_service_lines', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('investigation_type')->nullable();
            $table->integer('case_experience')->nullable();
            $table->integer('years_experience')->nullable();
            $table->integer('hourly_rate')->nullable();
            $table->integer('travel_rate')->nullable();
            $table->integer('milage_rate')->nullable();
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
        Schema::dropIfExists('investigator_service_lines');
    }
};
