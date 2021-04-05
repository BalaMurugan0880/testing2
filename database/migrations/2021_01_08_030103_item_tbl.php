<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ItemTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_tbl', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vendor_uniqid');
            $table->unsignedInteger('itemcat_id');
            $table->string('itemcat_name');
            $table->string('item_name');
            $table->string('item_desc');
            $table->string('item_price');
            $table->string('item_image');
            $table->string('item_deli');
            $table->string('item_pickup');
            $table->string('item_deliradius')->nullable();
            $table->string('item_deliprice')->nullable();
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
