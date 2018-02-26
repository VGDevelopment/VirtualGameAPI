<?php

/*
This was coded by Lewis Brindley under the VGDevelopment Organisation.
By the MIT License, you can do whatever you want with this file with no restrictions unless implied in the License.
You cannot however remove this commented in citation of the authorship of the file. You must add this to any file using code from this file.
*/

namespace VirtualGameAPI\util;

use VirtualGameAPI\API;

class ErrorHandler {

    const ERROR_0X00 = [
        "reason" => "Sorry, an unknown error occured.",
        "cause" => null
    ];

    const ERROR_0X01 = [
        "reason" => "Sorry, there was an error setting the max player and min player values.",
        "cause" => [
            "The max player value is less than the min player value.",
            "The min player value is greater than the max player value."
        ]
    ];

    const ERROR_0X02 = [
        "reason" => "Sorry, we couldn't find the game instance.",
        "cause" => [
            "The game wasn't made on startup. Use makeGame() to create a game."
        ]
    ];

    const ERROR_0X03 = [
        "reason" => "Sorry, an operation to the database failed.",
        "cause" => [
            "The credentials aren't correct. Please recheck.",
            "The database didn't respond correctly.",
            "The connection failed. May be due to some traffic or database denying requests."
        ]
    ];

    const ERROR_UNKNOWN = 0x00;
    const ERROR_MINP_MAXP = 0x01;
    const ERROR_GAME_NO_EXIST = 0x02;
    const ERROR_DB_ISSUE = 0x03;

    const ERROR_INT_TO_ARRAY = [
        self::ERROR_UNKNOWN => self::ERROR_0X00,
        self::ERROR_MINP_MAXP => self::ERROR_0X01,
        self::ERROR_GAME_NO_EXIST => self::ERROR_0X02,
        self::ERROR_DB_ISSUE => self::ERROR_0X03
    ];

    public static function callError(int $errorcode = self::ERROR_UNKNOWN): bool {
        $check = array_key_exists($errorcode, self::ERROR_INT_TO_ARRAY);
        if ($check !== true) {
            return false;
        }
        $server = API::getServer();
        $logger = $server->getLogger();
        $error = self::ERROR_INT_TO_ARRAY[$errorcode];
        $r = $error["reason"];
        $c = null;
        if ($error["cause"] !== null) {
            $c = implode("\n", $error["cause"]);
        }
        $logger->critical($r);
        $logger->crticial("Error Code: " . (string)$errorcode);
        if ($c !== null) {
            $logger->critical("Possible cause(s):");
            $logger->critical($c);
        }
        return true;
    }

}