<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'Hactive8',
            'email'=>'hactive8@hactive8.com',
            'password'=>'hactive8',
            'role'=>'AcountManager'],
            ['name'=>'MNC',
            'email'=>'mnc@mnc.com',
            'password'=>'mncmnc',
            'role'=>'AcountManager'],
            ['name'=>'Gramedia',
            'email'=>'gramedia@gramedia.com',
            'password'=>'gramedia',
            'role'=>'AcountManager'],
            ['name'=>'Administrator',
            'email'=>'admin@admin.com',
            'password'=>'123456',
            'role'=>'Administrator'],            
        ];

        foreach($data as $d){
            DB::table('users')->insert([
                'name' => $d['name'],
                'email' => $d['email'],
                'password' => bcrypt($d['password']),
                'role' => $d['role'],
            ]);
        }        
    }
}
