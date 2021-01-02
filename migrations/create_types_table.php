<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table)
        {
            //IDs
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable(false);
            
            //Business Attributes
            $table->tinyInteger('active_flag')->nullable(false)->default(1);
            $table->tinyInteger('mandatory_flag')->nullable(false)->default(0);
            $table->string('name',250)->nullable(false);
            $table->string('name_fr',250)->nullable(true);
            $table->string('label',250)->nullable(true);
            $table->integer('order_by')->nullable(true);
            
            //Timestamps
            $table->datetime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable(false);
            $table->datetime('deleted_at')->nullable(true);
            $table->datetime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->nullable(false);
            
            //Foreign Keys / Indexes
            $table->foreign('parent_id')->references('id')->on('types');
            $table->unique('id', 'parent_id');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
}
