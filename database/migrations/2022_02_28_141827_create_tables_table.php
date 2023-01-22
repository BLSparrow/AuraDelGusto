<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->integer('number');//Номер стола
            $table->string('image');
            $table->integer('quantity');//Количество мест
        });
    }

    public function down()
    {
        Schema::dropIfExists('tables');
    }
};
