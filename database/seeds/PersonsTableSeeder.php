<?php

use Illuminate\Database\Seeder;

class PersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'Wahyu Sudrajat',
            'phone'=>'08571234209',
            'email'=>'wahyu_sudrajat@fakemail.com',
            'avatar'=>'wahyu_sudrajat.png',
            'organization_id'=>'1'],
            ['name'=>'Subeno',
            'phone'=>'08765441252',
            'email'=>'subeno@fakemail.com',
            'avatar'=>'subeno.png',
            'organization_id'=>'1'],
            ['name'=>'Wahyono',
            'phone'=>'08765441252',
            'email'=>'wahyono@fakemail.com',
            'avatar'=>'wahyono.png',
            'organization_id'=>'2'],
            ['name'=>'Saefudin',
            'phone'=>'08765441252',
            'email'=>'saefudin@fakemail.com',
            'avatar'=>'saefudin.png',
            'organization_id'=>'3'],
                        
        ];

        foreach($data as $d){
            DB::table('persons')->insert([
                'name' => $d['name'],
                'email' => $d['email'],
                'phone' => $d['phone'],
                'avatar' => $d['avatar'],
                'organization_id' => $d['organization_id'],
            ]);
        }
    }
}
