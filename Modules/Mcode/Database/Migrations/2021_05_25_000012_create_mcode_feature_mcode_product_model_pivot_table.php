<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcodeFeatureMcodeProductModelPivotTable extends Migration
{
    public function up()
    {
        Schema::create('mcode_feature_mcode_product_model', function (Blueprint $table) {
            $table->unsignedBigInteger('mcode_feature_id');
            $table->foreign('mcode_feature_id', 'mcode_feature_id_fk_4001754')->references('id')->on('mcode_features')->onDelete('cascade');
            $table->unsignedBigInteger('mcode_product_model_id');
            $table->foreign('mcode_product_model_id', 'mcode_product_model_id_fk_4001754')->references('id')->on('mcode_product_models')->onDelete('cascade');
        });
    }

    
    public function down()
    {
        Schema::drop('mcode_feature_mcode_product_model');
    }
}
