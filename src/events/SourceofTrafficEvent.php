<?php

namespace repalogic\tyrios\analytics\events;

use repalogic\tyrios\analytics\data\WebEvent;

class SourceofTrafficEvent extends WebEvent
{
    protected string $traffic_name;
    protected array|null $tags;
    protected ?string $userId;
    protected ?string $sessionId;
    protected string|null $browser_agent;
    protected string $ip_address;

    public function __construct(string $traffic_name,string $ip_address,?string $browser_agent = null,
                                ?array $tags = [],
                                string $userId="",
                                string $sessionId=""
    ){
        $this->extracted($this,$traffic_name,$ip_address,$browser_agent,$tags,$userId,$sessionId);

        $object["traffic_name"] = $traffic_name;
        $object["tags"] = $tags;
        $object["userId"] = $userId;
        $object["sessionId"] = $sessionId;

        parent::__construct($userId,$sessionId,$tags,$browser_agent,$ip_address,
                            date('Y-m-d\TH:i:s'), "ta_web", "source_of_traffic_event",$object);
    }

    public function extracted(object $object,string $traffic_name,string $ip_address,?string $browser_agent=null,
                              ?array $tags=[],?string $userId="",?string $sessionId=""): void
    {
        $object->traffic_name = $traffic_name;
        $object->tags = $tags;
        $object->userId = $userId;
        $object->sessionId = $sessionId;
        $object->browser_agent = $browser_agent;
        $object->ip_address = $ip_address;
    }
}

