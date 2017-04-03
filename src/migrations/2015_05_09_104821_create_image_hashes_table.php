<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageHashesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('image_hashes', function(Blueprint $table)
		{
            $table->increments('image_hash_id');
            $table->unsignedInteger('user_id')->nullable()->index();
            $table->unsignedInteger('image_id')->index();
            $table->char('file_sha1', 40);
			$table->unsignedInteger('created_by')->nullable();
			$table->timestamp('created_at')->nullable();
			$table->ipAddress('created_ip')->nullable();
			$table->unsignedInteger('updated_by')->nullable();
			$table->timestamp('updated_at')->nullable();
			$table->ipAddress('updated_ip')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('image_hashes');
	}

}
