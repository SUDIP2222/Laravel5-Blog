<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Answers', function(Blueprint $table)
		{
			$table->increments('id');   
                        $table->integer('user_id')->unsigned();
                        $table->integer('question_id')->unsigned();
                        $table->text('answer');
			$table->timestamps();
                        
                        $table->foreign('user_id')
                                ->references('id')
                                ->on('users')
                                ->onDelete('cascade');
                         
                        $table->foreign('question_id')
                                ->references('id')
                                ->on('questions')
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
		Schema::drop('Answers');
	}

}
