<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('commerces', function (Blueprint $table) {
            $table->id();
            $table->string('name_commerce',50);
              
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('commerces');
    }
};
