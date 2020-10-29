
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csv', function (Blueprint $table) {
            $table->id();
            $table->string('Code');
            $table->string('Country');
            $table->string('Valid_from');
            $table->string('Valid_until');
            $table->integer('Stunden');
            $table->integer('One_day');
            $table->integer('Lump_sum');
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
        Schema::dropIfExists('csv');
    }
}
