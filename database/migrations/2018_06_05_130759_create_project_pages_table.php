<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::enableForeignKeyConstraints();
        Schema::create('project_pages', function (Blueprint $table) {
            $table->increments('id');

            $table->string('background_color')->default("#c2d6f2");
            $table->string('foreground_color')->default("#c2d6f2");

            $table->string('thumbnail');
            $table->string('content')->nullable();
            $table->string('content_type');

            $table->text('description')->nullable();

            $table->string('style')->nullable();
            $table->string('device')->nullable();

            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            $table->boolean('enabled')->default(true);
            $table->boolean('sort_order')->default(0);

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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('project_pages');
    }
}
