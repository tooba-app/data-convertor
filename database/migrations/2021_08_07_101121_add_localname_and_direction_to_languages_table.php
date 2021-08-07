<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocalnameAndDirectionToLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("languages", function (Blueprint $table) {
            $table->string("localname")->nullable();
            $table->string("direction")->default("ltr");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("languages", function (Blueprint $table) {
            //
        });
    }
}
