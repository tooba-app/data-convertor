<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionsRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("actions_relation", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("parent_action_id")
                ->constrained("actions", "id")
                ->onDelete("CASCADE");

            $table
                ->foreignId("action_id")
                ->constrained("actions", "id")
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
        Schema::dropIfExists("actions_relation");
    }
}
