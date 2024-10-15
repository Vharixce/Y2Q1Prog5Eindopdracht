<?php

namespace App\Models;

class Specialisations {
    public static function all(): array
    {

       return [
        [
            'id' => 1,
            'name' => 'Fireball',
            'cooldown' => '5 seconds',
        ],
        [
            'id' => 2,
            'name' => 'Ice Blast',
            'cooldown' => '8 seconds',
        ],
        [
            'id' => 3,
            'name' => 'Thunder Strike',
            'cooldown' => '10 seconds',
        ],
        [
            'id' => 4,
            'name' => 'Healing Aura',
            'cooldown' => '12 seconds',
        ],
        [
            'id' => 5,
            'name' => 'Shadow Cloak',
            'cooldown' => '15 seconds',
        ],
        [
            'id' => 6,
            'name' => 'Wind Dash',
            'cooldown' => '3 seconds',
        ],
        [
            'id' => 7,
            'name' => 'Earthquake',
            'cooldown' => '20 seconds',
        ],
        [
            'id' => 8,
            'name' => 'Water Shield',
            'cooldown' => '7 seconds',
        ],
        [
            'id' => 9,
            'name' => 'Poison Cloud',
            'cooldown' => '9 seconds',
        ],
        [
            'id' => 10,
            'name' => 'Teleport',
            'cooldown' => '6 seconds',
        ],
    ];
    }
}

//public static function find(int $id): array
//{
//

//}

