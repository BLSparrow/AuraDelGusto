<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('table_id')->constrained('tables')->cascadeOnDelete()->cascadeOnUpdate();

            //время начала и конца брони
            $table->dateTime('dateStart');
            $table->dateTime('dateEnd');
            //Сумма для предоплаты (перестраховка)
            $table->decimal('prepayment');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
