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
        Schema::create('flights', function (Blueprint $table) {
            // $table->id();
            // $table->string('name');
            // $table->string('airline');
            // $table->timestamps();
            $table->after('name', function ($table) {
                $table->string('address_line1');
                $table->string('address_line2');
                $table->string('city');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('flights');
    }
};
