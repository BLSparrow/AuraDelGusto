<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('image');

            $table->foreignId('category_id')->constrained('category_products')->cascadeOnDelete()->cascadeOnUpdate();

            $table->double('weight');
            $table->decimal('price');
            $table->integer('kilocalories');
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
