<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loker', function (Blueprint $table) {
            $table->id();
            $table->string('owner');
            $table->foreignId('user_id');
            $table->string('thumbnail')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('company');
            $table->text('requirtmen');
            $table->text('about');
            $table->string('contactperson');
            $table->string('statuse');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professions');
    }
}
