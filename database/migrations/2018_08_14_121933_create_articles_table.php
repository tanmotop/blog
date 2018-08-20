<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->index();
            $table->string('title')->comment('标题');
            $table->string('description')->comment('摘要');
            $table->string('banner')->nullable();
            $table->string('slug')->unique();
            $table->longText('content');
            $table->longText('html_content');
            $table->tinyInteger('type')->default(0)->comment('文章类型0原创1转载');
            $table->tinyInteger('status')->default(0)->comment('状态0未发布1已发布');
            $table->string('source')->nullable()->comment('转载来源');
            $table->integer('view_count')->unsigned()->default(0)->comment('浏览量');
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
