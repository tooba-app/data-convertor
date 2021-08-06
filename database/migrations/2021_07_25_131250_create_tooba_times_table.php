<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToobaTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("tooba_times", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("creator_id")
                ->constrained("users", "id")
                ->onDelete("CASCADE");
            $table
                ->foreignId("title_id")
                ->nullable()
                ->constrained("texts", "text_id")
                ->onDelete("SET NULL");
            $table
                ->foreignId("description_id")
                ->nullable()
                ->constrained("texts", "text_id")
                ->onDelete("SET NULL");

            $table->string("time")->nullable();
            $table->string("depend_on")->default("time");

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
        Schema::dropIfExists("tooba_times");
    }
}
