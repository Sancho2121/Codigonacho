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
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name',100);
            $table->string('app_shortname',20);
            $table->string('app_weburl',100)->nullable();
            $table->string('app_logo',100)->nullable();
            $table->string('app_favicon',100)->nullable();
            $table->string('app_wallpaper',100)->nullable();
            $table->string('app_color',100);
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
        Schema::dropIfExists('app_settings');
    }
};
