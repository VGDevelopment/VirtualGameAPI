<?php

/*
This was coded by Lewis Brindley under the VGDevelopment Organisation.
By the MIT License, you can do whatever you want with this file with no restrictions unless implied in the License.
You cannot however remove this commented in citation of the authorship of the file. You must add this to any file using code from this file.
*/

namespace VirtualGameAPI\util;

class Converter {

    const TICK = 20; // a tick is 20 seconds.
    const UT = 60;

    /**
     * Convert seconds to ticks. 
     *
     * @param integer $second
     * @return integer
     */
    public static function convertSecondToTick(int $second): int {
        $tick = $second * self::TICK;
        return $tick;
    }

    /**
     * Convert minutes to ticks.
     *
     * @param integer $minute
     * @return integer
     */
    public static function convertMinuteToTick(int $minute): int {
        $second = $minute * self::UT;
        return self::convertSecondToTick($second);
    }

    /**
     * Convert hours to ticks.
     *
     * @param integer $hour
     * @return integer
     */
    public static function convertHourToTick(int $hour): int {
        $minute = $hour * self::UT;
        return self::convertMinuteToTick($minute);
    }

}