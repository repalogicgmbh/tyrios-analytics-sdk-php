<?php

namespace repalogic\tyrios\analytics\events;

use repalogic\tyrios\analytics\data\WebEvent;

class StartEngagementEvent extends WebEvent
{
    protected string $section_name;
    protected string $section_start_time_msec;
    protected array|null $tags;
    protected ?string $userId;
    protected ?string $sessionId;
    protected string|null $browser_agent;
    protected string $ip_address;

    public function __construct(string $section_name,string $section_start_time_msec,string $ip_address,
                                ?string $browser_agent = null,
                                ?array $tags = [],
                                string $userId = "",
                                string $sessionId=""
    ){
        $this->section_name = $section_name;
        $this->section_start_time_msec = $section_start_time_msec;
        $this->tags = $tags;
        $this->userId = $userId;
        $this->sessionId = $sessionId;
        $this->browser_agent = $browser_agent;
        $this->ip_address = $ip_address;

        $object["section_name"] = $section_name;
        $object["section_start_time_msec"] = $section_start_time_msec;
        $object["tags"] = $tags;
        $object["userId"] = $userId;
        $object["sessionId"] = $sessionId;

        parent::__construct($userId,$sessionId,$tags,$browser_agent,$ip_address,
                            date('Y-m-d\TH:i:s'), "ta_web", "start_engagement_event",$object);
    }
}

