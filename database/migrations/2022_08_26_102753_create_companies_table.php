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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->text('main_description')->nullable();
            $table->text('sub_description')->nullable();
            $table->string('image')->nullable();
            $table->string('advantage_1_count')->nullable();
            $table->string('advantage_1_text')->nullable();

            $table->string('advantage_2_count')->nullable();
            $table->string('advantage_2_text')->nullable();

            $table->string('advantage_3_count')->nullable();
            $table->string('advantage_3_text')->nullable();

            $table->string('advantage_4_count')->nullable();
            $table->string('advantage_4_text')->nullable();
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
        Schema::dropIfExists('companies');
    }
};
