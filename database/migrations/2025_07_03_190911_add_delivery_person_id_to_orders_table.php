<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->unsignedBigInteger('delivery_person_id')->nullable()->after('user_id');
        
        // If you want, you can add foreign key constraint:
        $table->foreign('delivery_person_id')->references('id')->on('delivery_people')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->dropForeign(['delivery_person_id']);
        $table->dropColumn('delivery_person_id');
    });
}

};
