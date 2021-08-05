<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("places", function (Blueprint $table) {
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

            $table->string("lat");
            $table->string("long");
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
        Schema::dropIfExists("places");
    }
}
