<?php

class SV_DailyStatsImprovements_Listener
{
    const AddonNameSpace = 'SV_DailyStatsImprovements';

    public static function load_class($class, array &$extend)
    {
        $extend[] = self::AddonNameSpace.'_'.$class;
    }
}