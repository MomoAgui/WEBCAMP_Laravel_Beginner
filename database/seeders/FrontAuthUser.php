<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRegisterPost;

class FrontAuthUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(UserRegisterPost $request)
    {
        //
        DB::table('users')->insert([
            'name' => '$datum',
            'email' => '$datum',
            'email_verified_at' => date('Y-m-d H:i:s'),
            $datum['password']=>Hash::make($datum['password'])
        ]);
    }
}