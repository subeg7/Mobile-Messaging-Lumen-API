<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForigenKeysToCascadeDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('file_columns', function (Blueprint $table) {
      // $table->dropForeign('file_columns_data_file_id_foreign');
      $table->foreign('file_id')
          ->references('id')->on('file')
          ->onDelete('cascade');
          // ->change();
  });

  Schema::table('file_columns_data', function (Blueprint $table) {
      // $table->dropForeign('file_columns_data_column_id_foreign');
      $table->foreign('column_id')
          ->references('id')->on('file_columns')
          ->onDelete('cascade');
          // ->change();
  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
