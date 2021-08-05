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
                ->constrained("users", "id")
                ->onDelete("SET NULL")
                ->nullable();
            $table
                ->foreignId("action_id")
                ->constrained("action", "id")
                ->onDelete("CASCADE");

            $table
                ->foreignId("title_id")
                ->constrained("texts", "text_id")
                ->onDelete("SET NULL")
                ->nullable();
            $table
                ->foreignId("description_id")
                ->constrained("texts", "text_id")
                ->onDelete("SET NULL")
                ->nullable();

            $table
                ->foreignId("date_id")
                ->constrained("tooba_dates", "id")
                ->onDelete("CASCADE")
                ->nullable();

            $table
                ->foreignId("time_id")
                ->constrained("tooba_times", "id")
                ->onDelete("CASCADE")
                ->nullable();

            $table
                ->foreignId("place_id")
                ->constrained("places", "id")
                ->onDelete("CASCADE")
                ->nullable();

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
