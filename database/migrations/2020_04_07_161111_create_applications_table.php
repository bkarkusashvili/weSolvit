<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(1);
            $table->integer('priority')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('company');
            $table->foreignId('user_id')->nullable();
            $table->integer('identity');
            $table->integer('employes');
            $table->string('email');
            $table->string('phone');
            $table->string('type');
            $table->text('message');
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
        Schema::dropIfExists('applications');
    }
}
