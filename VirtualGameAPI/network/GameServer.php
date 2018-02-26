<?php

/*
This was coded by Lewis Brindley under the VGDevelopment Organisation.
By the MIT License, you can do whatever you want with this file with no restrictions unless implied in the License.
You cannot however remove this commented in citation of the authorship of the file. You must add this to any file using code from this file.
*/

namespace VirtualGameAPI\network;

use VirtualGameAPI\API;

use VirtualGameAPI\game\{
    GamePointer
};

class GameServer {

    private static $server;
    private static $ip;
    private static $port;

    /**
     * Starts up the game server manager.
     *
     * @return void
     */
    public static function start(): void {
        self::$server = API::getServer();
        self::$ip = self::$server->getIp();
        self::$port = self::$server->getPort();
    }

    /**
     * Check whether the appropriate server is the desired server.
     *
     * @return integer
     */
    public static function isServer(): int {
        $gameconst = 10000;
        foreach (GamePointer::GAME_TO_SERVER as $t => $s) {
            $server = explode("|", $s);
            if ($server[0] === self::$ip) {
                if ((int)$server[1] === (int)self::$port) {
                    $gameconst = $i;
                }
            }
        }
        return $gameconst;
    }

}