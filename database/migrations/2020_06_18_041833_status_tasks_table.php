<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StatusTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

    Schema::create('status_tasks', function (Blueprint $table) {
     $table->increments('id');
     $table->integer('status');
     $table->integer('tasks_id')->unsigned();
     $table->foreign('tasks_id')->references('id')->on('tasks');
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
