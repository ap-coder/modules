<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcodeProductModelsTable extends Migration
{
    public function up()
    {
        Schema::create('mcode_product_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('published')->default(0)->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
