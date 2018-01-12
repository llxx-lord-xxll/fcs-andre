<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MesssageMetas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('message_metas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('messages_id')->unsigned()->index();
            $table->foreign('messages_id')->references('id')->on('messages')->onDelete('cascade');
            $table->string('type')->default('null');
            $table->string('key')->index();
            $table->text('value')->nullable();
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
        Schema::dropIfExists('message_metas');
    }
}
