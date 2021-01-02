<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinistriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ministries', function (Blueprint $table)
        {
            //IDs
            $table->increments('id');
            
            //Business Attributes
            $table->string('acronym','10')->nullable(true);
            $table->string('name','250')->nullable(false);
            $table->string('name_abbreviated','250')->nullable(false);
            
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
        Schema::dropIfExists('ministries');
    }
}
