<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->bigIncrements('questionnaire_id');
            $table->integer('fk_user_id')->unsigned();
            $table->longText('started_year_for_personal_financial_plan')->nullable();
            $table->longText('personal_info')->nullable();
            $table->longText('income')->nullable();
            $table->longText('expenses')->nullable();
            $table->longText('net_assets')->nullable();
            $table->longText('gosi')->nullable();
            $table->longText('risks')->nullable();
            $table->longText('objective')->nullable();
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
        Schema::dropIfExists('questionnaires');
    }
}
