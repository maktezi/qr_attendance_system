<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('forms', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('fname');
        //     $table->string('mname');
        //     $table->string('lname');
        //     $table->string('dob');
        //     $table->string('sex');
        //     $table->string('occupation');
        //     $table->string('province');
        //     $table->string('address');
        //     $table->string('education');
        //     $table->string('sector');
        //     $table->string('contact');
        //     $table->string('email');
        //     $table->timestamps();
        // });
        Schema::create('forms', function (Blueprint $table) {
            $table->string('id', 8)->primary()->unique();
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('dob');
            $table->string('sex');
            $table->string('occupation');
            $table->string('province');
            $table->string('address');
            $table->string('education');
            $table->string('sector');
            $table->string('contact');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
