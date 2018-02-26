<?php

/*
This was coded by Lewis Brindley under the VGDevelopment Organisation.
By the MIT License, you can do whatever you want with this file with no restrictions unless implied in the License.
You cannot however remove this commented in citation of the authorship of the file. You must add this to any file using code from this file.
*/

namespace VirtualGameAPI;

use pocketmine\plugin\{
    PluginBase
};

use pocketmine\Server;
// >>>
use VirtualGameAPI\game\{
    GameManager
};

use VirtualGameAPI\network\{
    Database
};

class API {

    private static $os;
    private static $server;

    const IMPORT_CONNECTION = false; // turn to true if you want to import the db connection.

    /**
     * Starts up the whole API. Needs to be run when server starts.
     *
     * @param PluginBase $os
     * @return void
     */
    public static function start(self $os): void {
        self::$os = $os;
        self::$server = $os->getServer();
        Database::start(self::IMPORT_CONNECTION);
    }

    /**
     * Get OS.
     *
     * @return PluginBase
     */
    public static function getOS(): self {
        return self::$os;
    }
    
    /**
     * Get Server.
     *
     * @return Server
     */
    public static function getServer(): Server {
        return self::$server;
    }

}