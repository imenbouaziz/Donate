<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\http;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id('id')->unique();
            $table->string('invoice_to');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('note');
            $table->decimal('amount');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('campaign_id');
           // $table->unsignedBigInteger('campaign_name');
            $table->timestamps();


           $table->foreign('author_id')->references('id')->on('users');
           $table->foreign('campaign_id')->references('id')->on('campaigns');
        });
    }

  /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donation');
    }

}