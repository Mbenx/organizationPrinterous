<?php

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
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
            'phone'=>'021098765',
            'email'=>'hactive8@hactive8.com',
            'website'=>'hactive8.com',
            'logo'=>'hactive8.png',
            'user_id'=>'1'],
            ['name'=>'MNC',
            'phone'=>'021987653',
            'email'=>'mnc@mnc.com',
            'website'=>'mnc.com',
            'logo'=>'mnc.png',
            'user_id'=>'2'],
            ['name'=>'Gramedia',
            'phone'=>'021879262',
            'email'=>'gramedia@gramedia.com',
            'website'=>'gramedia.com',
            'logo'=>'gramedia.png',
            'user_id'=>'3'],            
        ];

        foreach($data as $d){
            DB::table('organizations')->insert([
                'name' => $d['name'],
                'phone' => $d['phone'],
                'email' => $d['email'],
                'website' => $d['website'],
                'logo' => $d['logo'],
                'user_id' => $d['user_id'],
            ]);
        }
    }
}
