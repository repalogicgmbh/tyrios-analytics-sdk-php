<?php

namespace repalogic\tyrios\analytics\events;

use repalogic\tyrios\analytics\data\WebEvent;

class AdClick extends WebEvent
{
    protected string $ad_event_id;
    protected string $ad_location;
    protected array|null $tags;
    protected ?string $userId;
    protected ?string $sessionId;
    protected string $ad_url;
    protected string|null $browser_agent;
    protected string $ip_address;

    public function __construct(string $ad_event_id,string $ad_location,string $ad_url,string $ip_address,
                                ?string $browser_agent = null,
                                ?array $tags=[],
                                string $userId = "",
                                string $sessionId=""
    )
    {
        $this->extracted($this,$ad_event_id,$ad_location,$ad_url,$ip_address,$browser_agent,$tags,$userId,$sessionId);

        $object["ad_event_id"] = $ad_event_id;
        $object["tags"] = $tags;
        $object["userId"] = $userId;
        $object["ad_location"] = $ad_location;
        $object["ad_url"] = $ad_url;
        $object["sessionId"] = $sessionId;

        parent::__construct($userId,$sessionId,$tags,$browser_agent,$ip_address,
                            date('Y-m-d\TH:i:s'), "ta_web", "ad_click", $object);
    }

    public function extracted(object $object,string $ad_event_id,string $ad_location,string $ad_url,string $ip_address,?string $browser_agent=null,
                              ?array $tags=[],?string $userId="",?string $sessionId=""): void
    {
        $object->ad_event_id = $ad_event_id;
        $object->tags = $tags;
        $object->userId = $userId;
        $object->ad_location = $ad_location;
        $object->ad_url = $ad_url;
        $object->sessionId = $sessionId;
        $object->browser_agent = $browser_agent;
        $object->ip_address = $ip_address;
    }
}

