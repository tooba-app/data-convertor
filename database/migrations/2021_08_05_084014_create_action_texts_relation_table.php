<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionTextsRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("action_texts_relation", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("action_id")
                ->constrained("actions", "id")
                ->onDelete("CASCADE");
            $table
                ->foreignId("text_id")
                ->constrained("texts", "text_id")
                ->onDelete("CASCADE");

            $table->integer("order");

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
        Schema::dropIfExists("action_texts_relation");
    }
}
