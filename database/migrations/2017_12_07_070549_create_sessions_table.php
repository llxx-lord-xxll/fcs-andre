<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $timestamps = [ "created_at" ]; // enable only to created_at
        Schema::create('sessions', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('ip_address', 45);
            $table->text('user_agent');
            $table->text('sescode');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
