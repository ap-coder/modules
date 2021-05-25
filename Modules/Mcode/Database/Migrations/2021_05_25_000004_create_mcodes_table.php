<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcodesTable extends Migration
{
    public function up()
    {
        Schema::create('mcodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('published')->default(0)->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->longText('desc')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
