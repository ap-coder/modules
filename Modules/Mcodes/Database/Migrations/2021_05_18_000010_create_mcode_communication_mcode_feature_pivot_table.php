<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcodeCommunicationMcodeFeaturePivotTable extends Migration
{
    public function up()
    {
        Schema::create('mcode_communication_mcode_feature', function (Blueprint $table) {
            $table->unsignedBigInteger('mcode_feature_id');
            $table->foreign('mcode_feature_id', 'mcode_feature_id_fk_3938870')->references('id')->on('mcode_features')->onDelete('cascade');
            $table->unsignedBigInteger('mcode_communication_id');
            $table->foreign('mcode_communication_id', 'mcode_communication_id_fk_3938870')->references('id')->on('mcode_communications')->onDelete('cascade');
        });
    }
}
