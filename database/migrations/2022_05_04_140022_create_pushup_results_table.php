<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePushupResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pushup_results', function (Blueprint $table) {
            $table->id();
            $table->string('pushup_result')->comment('腕立て回数');
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
        Schema::dropIfExists('pushup_results');
    }
}
