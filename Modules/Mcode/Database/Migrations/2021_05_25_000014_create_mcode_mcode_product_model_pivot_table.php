<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcodeMcodeProductModelPivotTable extends Migration
{
    public function up()
    {
        Schema::create('mcode_mcode_product_model', function (Blueprint $table) {
            $table->unsignedBigInteger('mcode_id');
            $table->foreign('mcode_id', 'mcode_id_fk_4001758')->references('id')->on('mcodes')->onDelete('cascade');
            $table->unsignedBigInteger('mcode_product_model_id');
            $table->foreign('mcode_product_model_id', 'mcode_product_model_id_fk_4001758')->references('id')->on('mcode_product_models')->onDelete('cascade');
        });
    }
}
