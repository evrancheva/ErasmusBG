<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
             $table->text('theme')->nullable()->after('slug');
              $table->text('criteria')->nullable()->after('slug');
               $table->text('fees')->nullable()->after('slug');
                $table->text('way_of_applying')->nullable()->after('slug');
                

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
             $table->dropColumn('theme');
              $table->dropColumn('criteria');
               $table->dropColumn('fees');
                $table->dropColumn('way_of_applying');
                 
        });
    }
}
