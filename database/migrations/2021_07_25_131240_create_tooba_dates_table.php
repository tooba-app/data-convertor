<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToobaDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("tooba_dates", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("creator")
                ->constrained("users", "id")
                ->onDelete("CASCADE");
            $table
                ->foreignId("title")
                ->constrained("texts", "text_id")
                ->onDelete("SET NULL")
                ->nullable();
            $table
                ->foreignId("description")
                ->constrained("texts", "text_id")
                ->onDelete("SET NULL")
                ->nullable();
            $table->integer("month");
            $table->integer("day");

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
        Schema::dropIfExists("tooba_dates");
    }
}
