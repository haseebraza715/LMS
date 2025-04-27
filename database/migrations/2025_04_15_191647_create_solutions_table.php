<?php
// database/migrations/xxxx_xx_xx_create_solutions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->id();
            // Each solution is linked to a task and a student user
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('user_id');
            $table->text('solution_text');
            // The points awarded after evaluation (nullable until evaluated)
            $table->integer('awarded_points')->nullable();
            // The timestamp when the solution was evaluated
            $table->timestamp('evaluated_at')->nullable();
            $table->timestamps();

            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('solutions');
    }
};
