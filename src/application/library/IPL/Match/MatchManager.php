<?php

/**
 * Created by PhpStorm.
 * User: ajith
 * Date: 5/1/17
 * Time: 6:17 PM
 */

namespace library\IPL\Match;

use models\Match_Update;
use models\MatchSchedule;

class MatchManager
{

    public static function getMatchDetails()
    {
        $date = date("Y-m-d H:i:s");
        $match = new Match_Update();
        $data = $match->getCurrentMatch($date);
        $response['success'] = 'true';
        $response['matchdetails'] = $data;
        return json_encode($response,JSON_UNESCAPED_SLASHES);
    }

    public static function getMatchSchedule()
    {
        $scheduleModel = new MatchSchedule();
        $teamSchedule = $scheduleModel->getTeamSchedule();
        $response['success'] = 'true';
        $response['matchschedule'] = $teamSchedule;
        return json_encode($response,JSON_UNESCAPED_SLASHES);
    }
}