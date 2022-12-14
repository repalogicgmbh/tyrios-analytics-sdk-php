<?php

namespace repalogic\tyrios\analytics\events;

use repalogic\tyrios\analytics\data\BasicEvent;
use repalogic\tyrios\analytics\data\SystemInformation;
use stdClass;

class Scroll extends BasicEvent
{
    protected string $section_name;
    protected array $tags;
    protected string $userId;
    protected string $sessionId;
    protected string $engagement_time_msec;

    public function __construct(string $section_name,
                                string $engagement_time_msec,array  $tags = [],
                                string $sessionId = "",
                                string $userId="",
    )
    {
        $this->section_name = $section_name;
        $this->tags = $tags;
        $this->sessionId = $sessionId;
        $this->userId = $userId;
        $this->engagement_time_msec = $engagement_time_msec;
        $object = new stdClass();
        $object->section_name = $section_name;
        $object->tags = $tags;
        $object->userId = $userId;
        $object->sessionId = $sessionId;
        $object->engagement_time_msec = $engagement_time_msec;

        $browser_agent = $_SERVER['HTTP_USER_AGENT'] ?? null;
        $ip_address = anonymizeIP($_SERVER['REMOTE_ADDR']) ?? null;
        parent::__construct(date('Y-m-d H:i:s'), "ta_web", "scroll",$object,$userId,$sessionId,$tags,$browser_agent,$ip_address);
    }

}

