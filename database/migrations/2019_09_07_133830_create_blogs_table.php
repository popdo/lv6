<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->integer('user_id')->index()->comment('作者');
            $table->string('title',200)->index()->comment('标题');
            $table->string('name',200)->unique()->comment('别名');
            $table->text('content')->comment('内容');
            $table->boolean('status')->default(false)->index()->comment('状态:0-公开,1-草稿');
            $table->boolean('comment_status')->default(false)->comment('评论状态:0-开启,1-关闭');
            $table->integer('comment_count')->default(0)->comment('评论数');
            // $table->integer('category_id')->index()->comment('分类');
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
        Schema::dropIfExists('blogs');
    }
}
