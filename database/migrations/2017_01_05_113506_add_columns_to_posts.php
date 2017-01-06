<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
             $table->string('location')->nullable()->after('slug');
              $table->date('start_date')->nullable()->after('slug');
              $table->date('end_date')->nullable()->after('slug');
              $table->string('organization_email')->nullable()->after('slug');
              $table->string('additional_link')->nullable()->after('slug');
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
            $table->dropColumn('location');
              $table->dropColumn('start_date');
                $table->dropColumn('end_date');
                  $table->dropColumn('organization_email');
                    $table->dropColumn('additional_link');
        });
    }
}
