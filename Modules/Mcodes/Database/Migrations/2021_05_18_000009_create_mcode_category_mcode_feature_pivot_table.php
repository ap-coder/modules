<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcodeCategoryMcodeFeaturePivotTable extends Migration
{
    public function up()
    {
        Schema::create('mcode_category_mcode_feature', function (Blueprint $table) {
            $table->unsignedBigInteger('mcode_feature_id');
            $table->foreign('mcode_feature_id', 'mcode_feature_id_fk_3938831')->references('id')->on('mcode_features')->onDelete('cascade');
            $table->unsignedBigInteger('mcode_category_id');
            $table->foreign('mcode_category_id', 'mcode_category_id_fk_3938831')->references('id')->on('mcode_categories')->onDelete('cascade');
        });
    }
}
