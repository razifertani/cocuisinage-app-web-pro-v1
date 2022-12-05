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
        Schema::create('fcm_notifications', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('sender_id')->nullable();
            $table->foreign('sender_id')->references('id')->on('professional')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('receiver_id');
            $table->foreign('receiver_id')->references('id')->on('professional')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('notification_type_id');
            $table->foreign('notification_type_id')->references('id')->on('notifications_types')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('establishment_id');
            $table->foreign('establishment_id')->references('id')->on('establishments')->onUpdate('cascade')->onDelete('cascade');

            $table->string('title');
            $table->string('body');

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
        Schema::dropIfExists('fcm_notifications');
    }
};
