<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("texts", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("text_id")
                ->constrained("texts", "id")
                ->onDelete("CASCADE");

            $table
                ->foreignId("creator")
                ->constrained("users")
                ->onDelete("SET NULL");

            $table
                ->foreignId("language")
                ->constrained("languages")
                ->onDelete("CASCADE");

            $table->text("text");
            $table->string("type");
            $table->string("status");

            $table
                ->foreign("text_id")
                ->references("id")
                ->on("texts");

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
        Schema::dropIfExists("text");
    }
}
