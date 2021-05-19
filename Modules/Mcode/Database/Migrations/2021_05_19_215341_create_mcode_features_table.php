<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMcodeFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
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
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mcode_features');
    }
}
