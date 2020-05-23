<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->string('company')->nullable()->change();
            $table->integer('identity')->nullable()->change();
            $table->integer('employes')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('type')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->string('company')->nullable(false)->change();
            $table->integer('identity')->nullable(false)->change();
            $table->integer('employes')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->string('type')->nullable(false)->change();
        });
    }
}
