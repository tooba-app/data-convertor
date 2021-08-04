<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("actions", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("creator")
                ->constrained("users")
                ->onDelete("SET NULL");
            $table
                ->foreignId("title")
                ->constrained("texts", "text_id")
                ->onDelete("SET NULL");
            $table
                ->foreignId("description")
                ->constrained("texts", "text_id")
                ->onDelete("SET NULL");

            $table->string("type");
            $table->integer("score");

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
        Schema::dropIfExists("actions");
    }
}
