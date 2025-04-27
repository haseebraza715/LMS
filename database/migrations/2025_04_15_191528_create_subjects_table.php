<?php

// database/migrations/xxxx_xx_xx_create_subjects_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            // The teacher who creates the subject
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->text('description')->nullable();
            // The subject code must follow the "IK-SSSNNN" format (validation later)
            $table->string('subject_code');
            $table->integer('credit_value');
            $table->timestamps();
            // Soft delete column
            $table->softDeletes();

            // Foreign key constraint linking to the users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('subjects');
    }
};
