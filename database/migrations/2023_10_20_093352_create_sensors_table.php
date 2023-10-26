<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_id')->constrained();
            $table->foreignId('location_id')->constrained();
            $table->foreignId('data_type_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sensors');
    }
};
