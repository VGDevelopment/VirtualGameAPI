<?php

/*
This was coded by Lewis Brindley under the VGDevelopment Organisation.
By the MIT License, you can do whatever you want with this file with no restrictions unless implied in the License.
You cannot however remove this commented in citation of the authorship of the file. You must add this to any file using code from this file.
*/

namespace VirtualGameAPI\game;

use VirtualGameAPI\API;

use VirtualGameAPI\game\{
    GamePointer
};

use VirtualGameAPI\util\{
    Converter,
    ErrorHandler
};

use VirtualGameAPI\network\{
    GameServer,
    Database
};

class GameManager implements GamePointer {

    const CHAR_RAND = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    const ID_LENGHT = 10;

    private static $db;
    private static $gameruntimelist = [];
    private static $gameinstancelist = [];
    private static $gameserver = [];

    /**
     * Starts up the game manager.
     *
     * @param API $api
     * @return void
     */
    public static function start(): void {
        self::$db = Database::getDB();
    }

    /**
     * Makes a game at startup which can be then started on run-time.
     *
     * @param integer $type
     * @param integer $maxplayer
     * @param array $time
     * @param string $gameworld
     * @param integer $minplayer
     * @return boolean
     */
    public static function makeGame(int $type = self::UNKNOWN, int $maxplayer, array $time, string $gameworld, int $minplayer = 1): bool {
        $tick = [];
        switch ($time["type"]) {
            case "H": {
                $tick["pre-start"] = Converter::convertHourToTick($time["ps"]);
                $tick["game-time"] = Converter::convertHourToTick($time["gt"]);
                break;
            }
            case "M": {
                $tick["pre-start"] = Converter::convertMinuteToTick($time["ps"]);
                $tick["game-time"] = Converter::convertMinuteToTick($time["gt"]);
                break;
            }
            case "S": {
                $tick["pre-start"] = Converter::convertSecondToTick($time["ps"]);
                $tick["game-time"] = Convertor::convertSecondToTick($time["gt"]);
            }
            case "T": {
                $tick["pre-start"] = $time["ps"];
                $tick["game-time"] = $time["gt"];
            }
        }
        if ($minplayer > $maxplayer) {
            ErrorHandler::callError(ErrorHandler::ERROR_MINP_MAXP);
            return false;
        }
        self::$gameinstancelist[$type] = [
            "minplayer" => $minplayer,
            "maxplayer" => $maxplayer,
            "pre-start" => $tick["pre-start"],
            "game-start" => $tick["game-start"],
            "world" => $gameworld,
        ];
        return true;
    }

    // INCOMPLETE
    public static function startGame(int $type = self::UNKNOWN): bool {
        $check = array_key_exists($type, self::$gameinstancelist);
        if ($check !== true) {
            ErrorHandler::callError(ErrorHandler::ERROR_GAME_NO_EXIST);
            return false;
        }
        $id = self::generateGameID($type);
        $data = self::$gameinstancelist[$type];
        $check = array_key_exists($type, self::$gameserver);
        if ($check === false) {
            $serverlist = self::GAME_TO_SERVER[$type];
            self::$gameserver[$type] = [];
            foreach ($serverlist as $server) {
                self::$gameserver[$type][$server] = true;
            }
        }
        $server = null;
        foreach ($gameserver[$type] as $i => $v) {
            if ($v === true) {
                $server = $i;
                break;
            }
        }
        if ($server === null) {
            return false;
        } else {
            $exp = explode("|", $server);
            $server = [
                "IP" => $exp[0],
                "PORT" => $exp[1]
            ];
        }
        // ...
    }

    /**
     * Generates a Unique ID based on game-type.
     *
     * @param integer $type
     * @return string
     */
    private static function generateGameID(int $type = self::UNKNOWN): string {
        $lenght = strlen(self::CHAR_RAND);
        $id = "";
        for ($i = 0; $i < self::ID_LENGHT; $i++) {
            $k = $lenght - 1;
            $rand = mt_rand(0, $k);
            $id .= self::CHAR_RAND[$rand];
        }
        $check = array_key_exists($id, self::$gameruntimelist[$type]);
        if ($check === true) {
            return self::generateGameID($type);
        }
        return $id;
    }

}