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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_date',20)->nullable();
            $table->boolean('supplier_type');
            $table->string('supplier_name',120);
            $table->integer('supplier_number');
            $table->string('supplier_razonsocial',120)->nullable();
            $table->string('supplier_rfc',20)->nullable();
            $table->string('supplier_curp',20)->nullable();//
            $table->text('supplier_address')->nullable();
            $table->string('supplier_city',50)->nullable();
            $table->string('supplier_town',50)->nullable();
            $table->string('supplier_postal',10)->nullable();
            $table->string('supplier_state',50)->nullable();
            $table->string('supplier_country',50)->nullable();
            $table->string('supplier_email',50)->nullable();
            $table->string('supplier_phone',50)->nullable();
            $table->string('supplier_contact',100)->nullable();//
            $table->string('supplier_logo',100)->nullable();
            $table->integer('credit_days')->nullable();
            $table->integer('coin_id')->nullable();
            $table->integer('bank_id')->nullable();
            $table->string('bank_place',100)->nullable();
            $table->string('bank_branch',100)->nullable();
            $table->string('bank_account',50)->nullable();
            $table->string('bank_clabe',50)->nullable();
            $table->integer('bank_optional_id')->nullable();
            $table->string('bank_optional_place',100)->nullable();
            $table->string('bank_optional_branch',100)->nullable();
            $table->string('bank_optional_account',100)->nullable();
            $table->string('bank_optional_clabe',100)->nullable();
            $table->string('reference1_razonsocial',120)->nullable();
            $table->string('reference1_contact',100)->nullable();//
            $table->string('reference1_phone',50)->nullable();
            $table->string('reference2_razonsocial',120)->nullable();
            $table->string('reference2_contact',100)->nullable();//
            $table->string('reference2_phone',50)->nullable();
            $table->string('seller_name',100)->nullable();//
            $table->string('seller_email',50)->nullable();
            $table->string('seller_phone',50)->nullable();
            $table->text('supplier_observations')->nullable();
            $table->text('supplier_sign')->nullable();
            $table->boolean('supplier_status')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('suppliers');
    }
};
