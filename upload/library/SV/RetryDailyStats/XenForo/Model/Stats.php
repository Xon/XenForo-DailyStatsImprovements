<?php

class SV_RetryDailyStats_XenForo_Model_Stats extends XFCP_SV_RetryDailyStats_XenForo_Model_Stats
{
    public function buildStatsData($start, $end)
    {
        $retrycount = 2;
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