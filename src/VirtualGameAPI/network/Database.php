<?php

/*
This was coded by Lewis Brindley under the VGDevelopment Organisation.
By the MIT License, you can do whatever you want with this file with no restrictions unless implied in the License.
You cannot however remove this commented in citation of the authorship of the file. You must add this to any file using code from this file.
*/

namespace VirtualGameAPI\network;

use mysqli;

class Database {

    // Enter DB details here.
    const DB_DETAIL = [
        "host" => "",
        "user" => "",
        "pass" => "",
        "db" => ""
    ];

    private static $db = null;

    private static $classtoimportfrom = null; // replace null with ClassName::class to import from. Make sure there is a method called getDB() returning a mysqli object present in the class. Otherwise, make sure $import is false on startup and enter DB_DETAIL manually.

    /**
     * Starts up the database object used by the API.
     *
     * @param boolean $import
     * @return void
     */
    public static function start(bool $import = false): void {
        if ($import === true) {
            self::importDB();
            return;
        }
        self::createConnection();
        return;
    }

    /**
     * Get the database connection.
     *
     * @return mysqli
     */
    public static function getDB(): mysqli {
        return self::$db;
    }

    /**
     * Creates a database connection.
     *
     * @return boolean
     */
    private static function createConnection(): bool {
        $db = mysqli_connect(self::DB_DETAIL["host"], self::DB_DETAIL["user"], self::DB_DETAIL["pass"], self::DB_DETAIL["db"]);
        if (!($db instanceof mysqli)) {
            return false;
        }
        self::$db = $db;
        return true;
    }

    /**
     * Imports the connection from another object to use.
     *
     * @return boolean
     */
    private static function importDB(): bool {
        if ($classtoimportfrom !== null) {
            $db = self::$classtoimportfrom::getDB();
            if (!($db instanceof mysqli)) {
                return false;
            }
            self::$db = $db;
            return true;
        }
        return false;
    }

}