<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTodoTable digunakan untuk membuat table MyAppToDo
 */
class CreateTodoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("my_app_todo", function(Blueprint $table)
        {
            $table->increments("id");
            $table->string("title");
            $table->text("description")->nullable();
            $table->enum('type', array(
                'bug',
                'enhancement',
                'explanation',
                'new_feature'
            ))->default('bug');
            $table->enum('status', array(
                'progress',
                'done'
            ))->default('progress');
            $table->date("expired_at")->nullable();
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
        Schema::drop('my_app_todo');
	}

}
