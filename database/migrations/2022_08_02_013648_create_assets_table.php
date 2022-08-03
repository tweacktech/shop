<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('Type');
            $table->string('Serial_Number')->unique();
            $table->string('Description');
            $table->boolean('Fixed_or_Movable')->default(True);
            $table->string('Picture_path');
            $table->string('Purchase_date');
            $table->string('Start_use_date');
            $table->string('Purchase_price');
            $table->string('Warranty'); //expiry date
            $table->string('Degradation'); //year
            $table->string('CurrentV'); //current value in naira
            $table->string('Location');
 
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
        Schema::dropIfExists('assets');
    }
}
