<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_task', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->dateTime('start_date');
            $table->dateTime('due_date');
            $table->string('status');
            $table->timestamps();
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_task');
    }
}
