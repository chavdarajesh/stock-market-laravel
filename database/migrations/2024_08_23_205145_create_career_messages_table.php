<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareerMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
        	$table->string('email')->nullable();
        	$table->string('phone')->nullable();
        	$table->string('state')->nullable();
        	$table->string('city')->nullable();
            $table->string('resume')->nullable();
	        $table->text('message')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('career_messages');
    }
}
