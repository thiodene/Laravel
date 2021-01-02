<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table)
        {
            //IDs
            $table->increments('id');
            $table->integer('request_type_id')->unsigned()->nullable(false);
            $table->integer('user_id')->unsigned()->nullable(false);
            $table->integer('ministry_id')->unsigned()->nullable(false);
            $table->integer('requestor_team_type_id')->unsigned()->nullable(false);
            $table->integer('required_language_type_id')->unsigned()->nullable(false);
            
            // Requestor Info
            $table->string('requestor_name',250)->nullable(false);
            $table->string('requestor_email',250)->nullable(false);

            // Project Information
            $table->string('project_name',250)->nullable(false);
            $table->string('project_overview', 1000)->nullable(false);
            $table->tinyInteger('creative_brief')->nullable(false)->default(1);

            // Delivery Info
            $table->string('note', 1000)->nullable(true);
            $table->datetime('delivered_at')->nullable(false);
            $table->string('other_language',25)->nullable(true);

            //Timestamps
            $table->datetime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable(false);
            $table->datetime('deleted_at')->nullable(true);
            $table->datetime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->nullable(false);

            //Foreign Keys / Indexes
            $table->index('id');
            $table->foreign('request_type_id')->references('id')->on('types');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
