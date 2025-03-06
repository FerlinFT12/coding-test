<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('karakter', function (Blueprint $table) {
            $table->id();
            $table->string('input_1');
            $table->string('input_2');
            $table->string('persentase_karakter');
            $table->timestamps();
        });

        Schema::create('person', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->timestamps();
        });

        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->string('salary');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('person')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('managers', function (Blueprint $table) {
            $table->id();
            $table->string('bonus');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('employees')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->date('date');
            $table->string('present',2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karakter');
        Schema::dropIfExists('person');
        Schema::dropIfExists('employees');
        Schema::dropIfExists('managers');
        Schema::dropIfExists('attendances');
    }
};