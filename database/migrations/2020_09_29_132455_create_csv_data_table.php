<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsvDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up() {
          Schema::create ( 'csvData', function ($table) {
              $table->string ( 'code' );
              $table->string ( 'country' );
              $table->string ( 'valid_from' );
              $table->string ( 'valid_until' );
              $table->string ( 'stunden' );
              $table->string ( 'one_day' );
              $table->string ( 'lump_sum' );
          } );
      }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('csv_data');
    }
}
