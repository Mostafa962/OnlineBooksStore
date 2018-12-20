<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('edition');
            $table->string('title'); //replace with edition
            $table->integer('publication'); //change to date
            $table->text('description');
            $table->string('book_cover');
            $table->string('book_pdf')->nullable();
             $table->unsignedInteger('section_id');
            $table->foreign('section_id')
            ->references('id')->on('sections')
            ->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('books');
    }
}
