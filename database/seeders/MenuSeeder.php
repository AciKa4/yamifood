<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $menu = [
            [
                "name" => "Home",
                "route" => "/"
            ],
            [
                "name" => "Menu",
                "route" => "menu"
            ],
            [
                "name" => "Contact",
                "route" => "contact"
            ],
            [
                "name" => "About",
                "route" => "about"
            ]
        ];

    public function run()
    {
        foreach($this->menu as $m){
            \DB::table('menus')->insert(
                [
                    "name" => $m['name'],
                    "route" => $m['route']
                ]
            );
        }
    }
}
