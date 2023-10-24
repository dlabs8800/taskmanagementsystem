<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('category')->default('Uncategorized');
            $table->unsignedBigInteger('user_id');
            // Define user_id as a foreign key
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
