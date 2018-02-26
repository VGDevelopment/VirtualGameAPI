<?php

/*
This was coded by Lewis Brindley under the VGDevelopment Organisation.
By the MIT License, you can do whatever you want with this file with no restrictions unless implied in the License.
You cannot however remove this commented in citation of the authorship of the file. You must add this to any file using code from this file.
*/

namespace VirtualGameAPI\game;

interface GamePointer {

    const UNKNOWN = 0;
    const FACTION = 1;
    const SURVIVAL_GAME = 2;
    const HIDE_N_SEEK = 3;
    const SKYWAR = 4;
    const SKYBLOCK = 5;
    const TNT_RUN = 6;
    const BUILD_BATTLE = 7;

    const GAME_TO_SERVER = [
        self::UNKNOWN => [
            "gametype.yourdomain.com|19132"
        ],
        self::FACTION => [

        ],
        self::SURVIVAL_GAME => [

        ],
        self::HIDE_N_SEEK => [

        ],
        self::SKYWAR => [

        ],
        self::SKYBLOCK => [

        ],
        self::TNT_RUN => [

        ],
        self::BUILD_BATTLE => [

        ]
    ];

    const GAME_TYPE = [
        self::UNKNOWN,
        self::FACTION,
        self::SURVIVAL_GAME,
        self::HIDE_N_SEEK,
        self::SKYWAR,
        self::SKYBLOCK,
        self::TNT_RUN,
        self::BUILD_BATTLE
    ];

}