<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VendorTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('vendor_tbl', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vendor_id');
            $table->string('vendor_uniqid')->unique();
            $table->string('vendor_cmpyname');
            $table->string('vendor_pic');
            $table->string('vendor_addr');
            $table->string('vendor_city');
            $table->string('vendor_postcode');
            $table->string('vendor_state');
            $table->string('vendor_contact');
            $table->string('vendor_ssm');
            $table->string('vendor_logo');
            $table->string('vendor_logo_url');
            $table->string('vendor_url');
            
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
