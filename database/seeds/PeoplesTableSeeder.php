<?php

use Illuminate\Database\Seeder;

use App\People;

class PeoplesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        People::create([
            'name' => 'Tom Rensed',
            'position' =>'Chief Executive Officer',
            'images' => 'team_pic1.jpg',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.'
        ]);
        People::create([
            'name' => 'Kathren Mory',
            'position' =>'Vice President',
            'images' => 'team_pic2.jpg',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.'
        ]);
        People::create([
            'name' => 'Lancer Jack',
            'position' =>'Senior Manager',
            'images' => 'team_pic3.jpg',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.'
        ]);
    }
}
