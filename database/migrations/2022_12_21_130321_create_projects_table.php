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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('studid')->unique();
            $table->string('studname');
            $table->string('title')->unique();
            $table->integer('duration');
            $table->string('sdate')->nullable();
            $table->string('edate')->nullable();
            $table->string('progress')->default('Milestone 1');
            $table->string('status')->nullable();
            $table->string('svid');
            $table->string('ex1');
            $table->string('ex2');
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
        Schema::dropIfExists('projects');
    }
};