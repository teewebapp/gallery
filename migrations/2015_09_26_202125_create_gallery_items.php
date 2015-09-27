<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryItems extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gallery_items', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('description')->nullable();

			$table->unsignedInteger('cover');

			$table->unsignedInteger('gallery_id');
			$table->foreign('gallery_id')->references('id')->on('galleries');

			// image fields
			$table->string('image_file_name')->nullable();
			$table->integer('image_file_size')->nullable();
			$table->string('image_content_type')->nullable();
			$table->timestamp('image_updated_at')->nullable();

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
		Schema::drop('gallery_items');
	}

}
