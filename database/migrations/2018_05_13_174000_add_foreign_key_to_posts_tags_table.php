<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToPostsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts_tags', function (Blueprint $table) {
            $table->foreign('post_id', 'fk_posts_tags_posts')->references('id')->on('posts');
            $table->foreign('tag_id', 'fk_posts_tags_tags')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts_tags', function (Blueprint $table) {
            $table->dropForeign('fk_posts_tags_posts');
            $table->dropForeign('fk_posts_tags_tags');
        });
    }
}
