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
                ->constrained("users", "id")
                ->onDelete("SET NULL")
                ->nullable();

            $table->string("language");
            $table
                ->foreign("language")
                ->references("code")
                ->on("languages");

            $table->text("text");
            $table->string("type");
            $table->string("status");

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
