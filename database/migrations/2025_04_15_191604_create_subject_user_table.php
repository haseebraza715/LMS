<?php

// database/migrations/xxxx_xx_xx_create_subject_user_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('subject_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Alternatively, you can use a composite primary key:
            // $table->primary(['subject_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('subject_user');
    }
};
