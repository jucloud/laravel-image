<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageablesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('imageables', function(Blueprint $table) {
//            $table->increments('imageable_id');
//            $table->unsignedInteger('user_id')->index();

            // Adding more table related fields here...
            $table->morphs('imageable', 'imageable_index');
            $table->unsignedInteger('image_id')->index();
            $table->boolean('is_main')->default(false);
            $table->string('type')->nullable();
            $table->json('data')->nullable();

//            $table->unsignedInteger('created_by')->nullable();
//            $table->timestamp('created_at')->nullable();
//            $table->ipAddress('created_ip')->nullable();
//            $table->unsignedInteger('updated_by')->nullable();
//            $table->timestamp('updated_at')->nullable();
//            $table->ipAddress('updated_ip')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('imageables');
	}

}
