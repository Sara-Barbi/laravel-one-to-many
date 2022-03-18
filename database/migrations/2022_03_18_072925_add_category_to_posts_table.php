<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('category_id')    //foreign key, che sta nel one
            ->constrained()
            ->nullable()
            ->nullOnDelete();  //se si cancella la categoria, il post sarà null
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['category_id']);  //prima prendo la mia foreign key
            $table->dropColumn('category_id');   //poi creo la colonna
        });
    }
}
