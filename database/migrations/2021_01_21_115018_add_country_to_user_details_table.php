<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCountryToUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_details', function (Blueprint $table) {

            $table->unsignedBigInteger('citizenship_country_id')->index()->nullable();
            $table->foreign('citizenship_country_id')->references('id')->on('countries');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_details', function (Blueprint $table) {


            $table->dropForeign(['citizenship_country_id']);
            $table->dropColumn('citizenship_country_id');
        
        });
    }
}
