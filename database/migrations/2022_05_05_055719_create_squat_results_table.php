<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSquatResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('squat_results', function (Blueprint $table) {
            $table->id();
            $table->string('squat_result')->comment('スクワット回数');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            // 下記の書き方でcreated_atとupdated_atが作成される。
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
        Schema::dropIfExists('squat_results');
    }
}
