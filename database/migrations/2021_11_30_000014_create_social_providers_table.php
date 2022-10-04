<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialProvidersTable extends Migration
{
    public function up()
    {
        Schema::create('social_providers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('provider_id');
            $table->string('provider');
            $table->timestamps();
        });
    }
}
