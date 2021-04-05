<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddItemTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('additem_tbl', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('additemcat_id');
            $table->string('vendor_uniqid');
            $table->string('additem_name');
            $table->string('additem_price');
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
        //
    }
}
