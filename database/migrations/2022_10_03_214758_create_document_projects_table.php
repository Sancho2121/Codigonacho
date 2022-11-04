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
        Schema::create('document_projects', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->string('file_name',100);
            $table->string('file_ext',10);
            $table->string('file_name_ext',100);
            $table->string('file_path',250);
            $table->string('file_path_name_ext',250)->nullable();
            $table->integer('file_size');
            $table->integer('user_id')->nullable();
            $table->string('module')->nullable();
            $table->string('fecha_vigencia',10)->nullable();
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
        Schema::dropIfExists('document_projects');
    }
};
