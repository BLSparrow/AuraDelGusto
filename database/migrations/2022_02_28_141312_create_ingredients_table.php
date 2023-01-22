<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('kcal');//килокалории на 100г
            $table->decimal('price');//цена за 1кг
            $table->foreignId('category_id')->constrained('category_ingredients')->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::create('ingredient_menu', function (Blueprint $table) {

            $table->foreignId('ingredient_id')->constrained('ingredients')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('menu_id')->constrained('menus')->cascadeOnDelete()->cascadeOnUpdate();

            $table->primary(['ingredient_id', 'menu_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('ingredients');
        Schema::dropIfExists('ingredient_menu');
    }
};
