<?php

class SV_DailyStatsImprovements_XenForo_Model_Stats extends XFCP_SV_DailyStatsImprovements_XenForo_Model_Stats
{
    public function buildStatsData($start, $end)
    {
        $sv_stats_retry_count = XenForo_Application::getOptions()->sv_stats_retry_count;
        if (!$sv_stats_retry_count)
        {
            parent::buildStatsData($start, $end);
            return;
        }
        $retrycount = $sv_stats_retry_count;
        while($retrycount >= 0)
        {
            $retrycount--;
            try
            {
                parent::buildStatsData($start, $end);
                return;
            }
            catch(Exception $e)
            {
                // this will rollback the transaction
                XenForo_Error::logException($e, true);
            }
        }
    }
}