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
            $tables->string('address')->nullable->after(name);
            $tables->string('phone')->nullable->after(address);
            $tables->string('fax')->nullable->after(phone);
            $tables->string('president')->nullable->after(email);
            $tables->string('establishment')->nullable->after(president);
            $tables->string('number')->nullable->after(establishment);
            $tables->string('organization')->nullable->after(number);
            $tables->string('notification')->nullable->after(organization);
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
