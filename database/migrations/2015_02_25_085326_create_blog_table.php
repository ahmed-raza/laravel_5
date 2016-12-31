<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blog', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('users_id')->unsigned();
			$table->string('title')->unique();
			$table->string('img_name');
			$table->text('body');
			$table->string('description');
			$table->string('keywords');
			$table->string('slug');
			$table->timestamps();
			$table->timestamp('published_at');

			$table->foreign('users_id')
						->references('id')
						->on('users')
						->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('blog');
	}

}
