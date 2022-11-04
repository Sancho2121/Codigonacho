<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name',120);
            $table->integer('client_id');
            $table->integer('user_request');
            $table->integer('project_type');
            $table->string('contact_name',120)->nullable();
            $table->string('contact_phone',20)->nullable();
            $table->string('request_date',20)->nullable();
            $table->string('execution_date',20)->nullable();
            $table->string('end_execution_date',20)->nullable();
            $table->text('logistics')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('projects');
    }
};
