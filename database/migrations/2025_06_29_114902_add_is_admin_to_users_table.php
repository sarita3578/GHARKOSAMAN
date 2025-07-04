
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsAdminToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Adds the boolean column 'is_admin' with default false, after the 'password' column
            $table->boolean('is_admin')->default(false)->after('password');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Removes the 'is_admin' column if you roll back this migration
            $table->dropColumn('is_admin');
        });
    }
}
