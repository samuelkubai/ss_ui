<?php

use App\Course;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class MigrateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function() {
            $oldUsers = DB::table('users-old')
                ->get();
            DB::table('users')->truncate();
            foreach($oldUsers as $user)
            {
                DB::table('users')->insert([
                    'id' => $user->id,
                    'first_name' => $user->firstName,
                    'last_name' => $user->lastName,
                    'code' => $user->code,
                    'active' => $user->active,
                    'email' => $user->email,
                    'password' => $user->password,
                    'institution_id' => '1',
                    'course_id' => Course::where('slug', 'Bsc.IT')->first()->id,
                    'year' => '0000',
                    'intake' => '1',
                    'notice_notification' => '1',
                    'new_user' => '1',
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at
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
