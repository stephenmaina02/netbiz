<?php

use Illuminate\Database\Seeder;

use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(['username' => 'system'],[
        	'name' => 'System',
        	'phone' => '0725000444',
        	'email' => 'system@netbiz.com',
        	'email_verified_at' => \Carbon\Carbon::now(),
        	'password' => bcrypt('exclamation'),
        	'role' => 'a',
        	'super_admin' => 'y',
        	'active' => 'y',
        ]);


        User::updateOrCreate(['username' => 'maina'],[
            'name' => 'Geoffrey Maina',
            'phone' => '0719432359',
            'email' => 'mainageoffrey61@gmail.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'password' => bcrypt('exclamation'),
        ]);
    }
}
