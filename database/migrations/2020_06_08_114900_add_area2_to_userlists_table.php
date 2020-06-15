<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArea2ToUserlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('userlists', function (Blueprint $table) {
            $table->string('area2')->nullable()->after('area');
            $table->string('area3')->nullable()->after('area2');
            $table->string('building2')->nullable()->after('building');
            $table->string('building3')->nullable()->after('building2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('userlists', function (Blueprint $table) {
            $table->dropColumn('area2');
            $table->dropColumn('area3');
            $table->dropColumn('building2');
            $table->dropColumn('building3');
        });
    }
}
