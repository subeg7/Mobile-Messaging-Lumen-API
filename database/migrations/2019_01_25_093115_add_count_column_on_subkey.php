<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCountColumnOnSubkey extends Migration
{
  public function up()
{
    Schema::table('pull_sub_keys', function($table) {
        $table->integer('count')->after('name');
    });
}

public function down()
{
    Schema::table('pull_sub_keys', function($table) {
        $table->dropColumn('paid');
    });
}
}
