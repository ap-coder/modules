<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcodeFeaturesTable extends Migration
{
    public function up()
    {
        Schema::create('mcode_features', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('published')->default(0)->nullable();
            $table->string('mcode')->nullable();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->string('source_string')->nullable();
            $table->string('safe_source')->nullable();
            $table->string('client_name')->nullable();
            $table->longText('client_description')->nullable();
            $table->string('state')->nullable();
            $table->longText('template')->nullable();
            $table->string('defaults')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::drop('mcode_features');
    }
}
