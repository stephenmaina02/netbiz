<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReferedUserIdToUserRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('user_relations', function (Blueprint $table) {
        //     if (Schema::hasColumn('user_relations','')) {
        //         $table->integer('refered_user_id');
        //     }
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_relations', function (Blueprint $table) {
            $table->dropColumn('refered_user_id');
        });
    }
}
