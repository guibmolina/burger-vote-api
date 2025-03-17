<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BurgerVoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $linkPrefixIfoodImg = "https://static.ifood-static.com.br/image/upload/t_low/pratos/";

        DB::table('burger_votes')->insert(
            [
                    [
                        'name' => "Smash Burguer",
                        'image' => $linkPrefixIfoodImg. "4af75ffa-d87c-4f2c-95dc-24a98df47f35/202204280403_W71D_i.jpg",
                    ],
                    [
                        'name' => "Smash Salad",
                        'image' => $linkPrefixIfoodImg. "4af75ffa-d87c-4f2c-95dc-24a98df47f35/202204280358_463M_i.jpg",
                    ],
                    [
                        'name' => "Smash Bacon",
                        'image' => $linkPrefixIfoodImg. "4af75ffa-d87c-4f2c-95dc-24a98df47f35/202204280359_CV2G_i.jpg",
                    ],
                    [
                        'name' => "Double Smash",
                        'image' => $linkPrefixIfoodImg. "4af75ffa-d87c-4f2c-95dc-24a98df47f35/202204280356_65Q7_i.jpg",
                    ],
                    [
                        'name' => "Triple Smash",
                        'image' => $linkPrefixIfoodImg. "4af75ffa-d87c-4f2c-95dc-24a98df47f35/202408222205_P573_i.jpg",
                    ],
                    [
                        'name' => "Smash D`Acasa",
                        'image' => $linkPrefixIfoodImg. "4af75ffa-d87c-4f2c-95dc-24a98df47f35/202307171649_TSO8_i.jpg",
                    ],
                    [
                        'name' => "Big D`Acasa",
                        'image' => $linkPrefixIfoodImg. "4af75ffa-d87c-4f2c-95dc-24a98df47f35/202204280401_UJR4_i.jpg",
                    ],
                    [
                        'name' => "Smash Guaipá",
                        'image' => $linkPrefixIfoodImg. "4af75ffa-d87c-4f2c-95dc-24a98df47f35/202205301740_463N_i.jpg",
                    ],
                    [
                        'name' => "Smash Catubacon",
                        'image' => $linkPrefixIfoodImg. "4af75ffa-d87c-4f2c-95dc-24a98df47f35/202205301743_N88F_i.jpg",
                    ],
                    [
                        'name' => "Smash Supremo",
                        'image' => $linkPrefixIfoodImg. "4af75ffa-d87c-4f2c-95dc-24a98df47f35/202307171648_RT06_i.jpg",
                    ],
            ]
        );
    }
}
