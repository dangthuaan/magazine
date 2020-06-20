<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsBlockToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('users', 'is_block')) {
            Schema::table('users', function (Blueprint $table) {
                $table->boolean('is_block')->default(0)->after('role_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('users', 'is_block')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('block');
            });
        }
    }
}
