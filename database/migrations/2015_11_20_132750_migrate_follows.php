<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrateFollows extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function() {
            $oldGroups = DB::table('follows-old')
                ->get();
            DB::table('group_user')->truncate();
            foreach($oldGroups as $follower)
            {
                DB::table('groups_user')->insert([
                    'user_id' => $follower->user_id,
                    'group_id' => $follower->group_id,
                    'created_at' => $follower->created_at,
                    'updated_at' => $follower->updated_at
                ]);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
