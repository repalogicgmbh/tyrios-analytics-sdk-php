<?php

namespace repalogic\tyrios\analytics\events;

use repalogic\tyrios\analytics\data\BasicEvent;
use repalogic\tyrios\analytics\data\SystemInformation;
use stdClass;

class StartEngagementEvent extends BasicEvent
{
    protected string $section_name;
    protected string $section_start_time_msec;
    protected array $tags;
    protected string $userId;
    protected string $sessionId;

    public function __construct(string $section_name, string $section_start_time_msec, array $tags = [], string $userId = "", string $sessionId="")
    {
        $this->section_name = $section_name;
        $this->section_start_time_msec = $section_start_time_msec;
        $this->tags = $tags;
        $this->userId = $userId;
        $this->sessionId = $sessionId;
        $object = new stdClass();
        $object->section_name = $section_name;
        $object->section_start_time_msec = $section_start_time_msec;
        $object->tags = $tags;
        $object->userId = $userId;
        $object->sessionId = $sessionId;

        $browser_agent = $_SERVER['HTTP_USER_AGENT'] ?? null;
        $ip_address = anonymizeIP($_SERVER['REMOTE_ADDR']) ?? null;
        parent::__construct(date('Y-m-d H:i:s'), "ta_web", "start_engagement_event",$object,$userId,$sessionId,$tags,$browser_agent,$ip_address);
    }
}

