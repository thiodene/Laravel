<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_media', function (Blueprint $table)
        {
            //IDs
            $table->increments('id');
            $table->integer('request_id')->unsigned()->nullable(false);
            $table->integer('type_id')->unsigned()->nullable(false);
            
            //Timestamps
            $table->datetime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable(false);
            $table->datetime('deleted_at')->nullable(true);
            $table->datetime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->nullable(false);
            
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_media');
    }
}
