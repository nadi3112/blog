<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BlogComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('blogs_comments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('comment');
			$table->integer('blog_id');
            $table->datetime('published_at')->nullable();
        });
		
		
		
		Schema::table('blogs_comments', function (Blueprint $table) {
		   $table->index('blog_id');
		   $table->foreign('blog_id')->references('id')->on('blogs')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs_comments');
    }
}
