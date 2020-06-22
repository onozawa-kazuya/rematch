<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRegisterToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->nullable()->after('name');
            $table->string('phone')->nullable()->after('address');
            $table->string('fax')->nullable()->after('phone');
            $table->string('president')->nullable()->after('email');
            $table->string('establishment')->nullable()->after('president');
            $table->string('number')->nullable()->after('establishment');
            $table->string('organization')->nullable()->after('number');
            $table->string('notification')->nullable()->after('organization');
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
            $table->dropColumn('phone');
            $table->dropColumn('fax');
            $table->dropColumn('president');
            $table->dropColumn('establishment');
            $table->dropColumn('number');
            $table->dropColumn('organization');
            $table->dropColumn('notification');
        });
    }
}
