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
            $table->string('name')->nullable();
            $table->string('product')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
