<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('job_title')->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->unsignedInteger('industry_id')->nullable();
            $table->string('email')->nullable();
            $table->string('linkedin');
            $table->string('nome_planilha');
            $table->boolean('hardbounce')->default(0);

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
        //
        Schema::dropIfExists('companies');
    }
}
