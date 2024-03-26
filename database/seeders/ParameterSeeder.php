<?php

namespace Database\Seeders;

use App\Models\Parameter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parameters = [
            [
                'key' => 'website_name',
                'value' => 'Fadhlan-Attr',
            ],
            [
                'key' => 'logo',
                'value' => '',
            ],
            [
                'key' => 'url',
                'value' => '',
            ],
            [
                'key' => 'address',
                'value' => 'A108 Adam Street, New York, NY 535022',
            ],
            [
                'key' => 'email',
                'value' => 'test@email.com',
            ],
            [
                'key' => 'phone',
                'value' => '09864412739126',
            ],
            [
                'key' => 'about_us',
                'value' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam nobis quis quas neque quo sed ut, fuga ea iusto repellendus obcaecati harum repellat nemo numquam quos, impedit suscipit, beatae laudantium laborum dolores illum tempora rerum voluptas. Quidem nihil soluta nemo perferendis exercitationem consequuntur laudantium praesentium ea omnis, atque alias temporibus iusto, molestias quas! Veritatis voluptatem consequuntur dolore sapiente aspernatur illum officiis hic quo sint aperiam maxime iusto in iure excepturi quasi, eveniet explicabo consequatur? Rerum odit optio dolores aliquam quas id officiis pariatur a maiores recusandae possimus fuga, quia expedita laboriosam nesciunt praesentium ratione incidunt ducimus. Vel illum molestiae velit?',
            ],
            [
                'key' => 'twitter',
                'value' => '',
            ],
            [
                'key' => 'facebook',
                'value' => '',
            ],
            [
                'key' => 'instagram',
                'value' => '',
            ],
            [
                'key' => 'skype',
                'value' => '',
            ],
            [
                'key' => 'linkedin',
                'value' => '',
            ],
        ];
        Parameter::insert($parameters);
    }
}
