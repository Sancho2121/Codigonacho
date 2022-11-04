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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_name',120);
            $table->string('client_razonsocial',120)->nullable();
            $table->string('client_rfc',20)->nullable();
            $table->text('client_address')->nullable();
            $table->string('client_city',50)->nullable();
            $table->string('client_postal',10)->nullable();
            $table->string('client_country',50)->nullable();
            $table->string('client_email',50)->nullable();
            $table->string('client_phone_1',50)->nullable();
            $table->string('client_phone_2',50)->nullable();
            $table->string('client_logo',50)->nullable();
            $table->text('client_active')->nullable();
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
        Schema::dropIfExists('clients');
    }
};
