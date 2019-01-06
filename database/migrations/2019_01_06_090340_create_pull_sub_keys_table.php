<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePullSubKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pull_sub_keys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('main_key_id');
            $table->string('name');
            $table->string('sucess_message');
            $table->integer('message_template_id');
            $table->integer('address_book_id');
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
        Schema::dropIfExists('pull_sub_keys');
    }
}
