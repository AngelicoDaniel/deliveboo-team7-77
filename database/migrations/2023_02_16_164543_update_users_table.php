<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('address', 100)->nullable();
            $table->unsignedBigInteger('PIVA')->unique()->default(0);
            $table->string('slug', 100)->nullable();
            $table->string('image_logo', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('PIVA');
            $table->dropColumn('slug');
            $table->dropColumn('image_logo');
        });
    }
}
