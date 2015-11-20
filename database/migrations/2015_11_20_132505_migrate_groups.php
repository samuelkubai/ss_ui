<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrateGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function() {
            $oldGroups = DB::table('groups-old')
                ->get();
            DB::table('groups')->truncate();
            foreach($oldGroups as $group)
            {
                DB::table('groups')->insert([
                    'id' => $group->id,
                    'user_id' => $group->user_id,
                    'username' => $group->username,
                    'name' => $group->name,
                    'description' => $group->description,
                    'institution_id' => '1',
                    'created_at' => $group->created_at,
                    'updated_at' => $group->updated_at
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
