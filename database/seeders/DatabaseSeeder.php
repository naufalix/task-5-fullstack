<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artikel;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=>'Naufal Ulinnuha',
                'email'=>'naufal@naufal.dev',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Admin',
                'email'=>'admin@naufal.dev',
                'password'=> bcrypt('admin'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }

        $categories = [
            [
                'name'=>'Web Programming',
            ],
            [
                'name'=>'Web Design',
            ],
            [
                'name'=>'Personal',
            ],
        ];
    
        foreach ($categories as $key => $ct) {
            Category::create($ct);
        }

        // $artikels = [
        //     [
        //         'nama'=>'Project P1',
        //         'keterangan'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ',
        //         'status'=>'Selesai',
        //     ],
        //     [
        //         'nama'=>'Project P2',
        //         'keterangan'=>'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
        //         'status'=>'Berjalan',
        //     ],
        //     [
        //         'nama'=>'Project P3',
        //         'keterangan'=>'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
        //         'status'=>'Selesai',
        //     ],
        // ];

        // foreach ($artikels as $key => $artikel) {
        //     Artikel::create($artikel);
        // }

        Artikel::factory(20)->create();
    }
}
