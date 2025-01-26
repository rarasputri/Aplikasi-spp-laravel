<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class Akun extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        [
            'name' => 'Raras',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 'admin'
        ],
        [
            'name' => 'Putri',
            'email' => 'petugas@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 'petugas'
        ],
    ];
    foreach($data as $key => $id){
        User::create($id);
    }
    }
}
