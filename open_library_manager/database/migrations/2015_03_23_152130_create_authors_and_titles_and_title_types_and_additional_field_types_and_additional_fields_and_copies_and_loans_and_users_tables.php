<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('authors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 45);
			$table->integer('birth_year')->nullable();
                        $table->text('note')->nullable(); 
			$table->timestamps();
		});
                Schema::create('titles', function(Blueprint $table)
                {
                        $table->increments('id');
                        $table->string('name', 100);
                        $table->integer('year')->nullable();
                        $table->text('note')->nullable();
                        $table->integer('title_type_id')->unsigned()->index();
                        $table->timestamps();
                });
                Schema::create('author_title', function(Blueprint $table)
                {
                        $table->increments('id');
                        $table->integer('author_id')->unsigned()->index();
                        $table->integer('title_id')->unsigned()->index();
                        $table->timestamps();
                });
                Schema::create('title_types', function(Blueprint $table)
                {
                        $table->increments('id');
                        $table->string('name', 45);
                        $table->timestamps();
                });
                Schema::create('title_t_additional_f_t', function(Blueprint $table)
                {
                        $table->increments('id');
                        $table->integer('title_type_id')->unsigned()->index();
                        $table->integer('additional_field_type_id')->unsigned()->index();
                        $table->timestamps();
                });
                Schema::create('additional_field_types', function(Blueprint $table)
                {
                        $table->increments('id');
                        $table->string('name', 25);
                        $table->string('data_type', 1);
                        $table->timestamps();
                });
                Schema::create('additional_fields', function(Blueprint $table)
                {
                        $table->increments('id');
                        $table->string('char_value', 250)->nullable();
                        $table->integer('int_value')->nullable();
                        $table->integer('additional_field_type_id')->unsigned()->index();
                        $table->integer('title_id')->unsigned()->index();
                        $table->timestamps();
                });
                Schema::create('copies', function(Blueprint $table)
                {
                        $table->increments('id');
                        $table->text('note')->nullable();
                        $table->integer('title_id')->unsigned()->index();
                        $table->timestamps();
                });
                Schema::create('loans', function(Blueprint $table)
                {
                        $table->increments('id');
                        $table->text('note')->nullable();
                        $table->date('expires_at');
                        $table->dateTime('returned_at')->nullable();
                        $table->integer('copy_id')->unsigned()->index();
                        $table->timestamps();
                });
                Schema::create('user_loan', function(Blueprint $table)
                {
                        $table->increments('id');
                        $table->integer('user_id')->unsigned()->index();
                        $table->integer('loan_id')->unsigned()->index();
                        $table->timestamps();
                }); 
                Schema::create('users', function(Blueprint $table)
                {
                        $table->increments('id');
                        $table->string('mail', 45);
                        $table->string('name', 45);
                        $table->string('username', 15);
                        $table->integer('level');
                        $table->timestamps();
                });
             
                Schema::table('author_title', function(Blueprint $table)
                {
                        $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
                        $table->foreign('title_id')->references('id')->on('titles')->onDelete('cascade');
                });
                Schema::table('titles', function(Blueprint $table)
                {
                        $table->foreign('title_type_id')->references('id')->on('title_types')->onDelete('cascade');
                });
                Schema::table('title_t_additional_f_t', function(Blueprint $table)
                {
                        $table->foreign('title_type_id')->references('id')->on('title_types')->onDelete('cascade');
                        $table->foreign('additional_field_type_id')->references('id')->on('additional_field_types')->onDelete('cascade');
                });
                Schema::table('additional_fields', function(Blueprint $table)
                {
                        $table->foreign('additional_field_type_id')->references('id')->on('additional_field_types')->onDelete('cascade');
                        $table->foreign('title_id')->references('id')->on('titles')->onDelete('cascade');
                });
                Schema::table('copies', function(Blueprint $table)
                {
                        $table->foreign('title_id')->references('id')->on('titles')->onDelete('cascade');
                });
                Schema::table('loans', function(Blueprint $table)
                {
                        $table->foreign('copy_id')->references('id')->on('copies')->onDelete('cascade');
                });
                Schema::table('user_loan', function(Blueprint $table)
                {
                        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                        $table->foreign('loan_id')->references('id')->on('loans')->onDelete('cascade');
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('authors');
		Schema::drop('author_title');
                Schema::drop('titles');
                Schema::drop('title_types');
                Schema::drop('title_type_additional_field_type');
                Schema::drop('additional_field_types');
                Schema::drop('additional_fileds');
                Schema::drop('copies');
                Schema::drop('loans');
                Schema::drop('user_loan');
                Schema::drop('users');

	}

}
