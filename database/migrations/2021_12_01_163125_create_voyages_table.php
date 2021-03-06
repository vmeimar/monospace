<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoyagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voyages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vessel_id');
            $table->string('code')->unique();
            $table->dateTime('start');
            $table->dateTime('end')->nullable();
            $table->string('status');
            $table->decimal('revenues', 8, 2)->nullable();
            $table->decimal('expenses', 8, 2)->nullable();
            $table->decimal('profit', 8, 2)->nullable();
            $table->timestamps();

            $table->index('vessel_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voyages');
    }
}
