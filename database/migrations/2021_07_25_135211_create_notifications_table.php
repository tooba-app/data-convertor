<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("notifications", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("creator_id")
                ->nullable()
                ->constrained("users", "id")
                ->onDelete("SET NULL");
            $table
                ->foreignId("action_id")
                ->constrained("actions", "id")
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

            $table
                ->foreignId("date_id")
                ->nullable()
                ->constrained("tooba_dates", "id")
                ->onDelete("CASCADE");

            $table
                ->foreignId("time_id")
                ->nullable()
                ->constrained("tooba_times", "id")
                ->onDelete("CASCADE");

            $table
                ->foreignId("place_id")
                ->nullable()
                ->constrained("places", "id")
                ->onDelete("CASCADE");

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
        Schema::dropIfExists("notifications");
    }
}
