<?php

class SV_RetryDailyStats_Listener
{
    const AddonNameSpace = 'SV_RetryDailyStats';

    public static function load_class($class, array &$extend)
    {
        $extend[] = self::AddonNameSpace.'_'.$class;
    }
}