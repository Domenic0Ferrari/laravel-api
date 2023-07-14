<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            // start my-projects
            $table->string('title', 100);
            // slug
            $table->string('slug', 100)->unique();

            $table->string('author', 30);
            $table->string('url_github', 200);
            $table->string('image', 300)->nullable();
            $table->text('description');
            // end my-projects
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
