<?php

namespace repalogic\tyrios\analytics\events\EcommerceEvents;

use repalogic\tyrios\analytics\data\WebEvent;

class SubmitItemRatings extends WebEvent
{
    protected string $item_name;
    protected string $item_id;
    protected string $rating;
    protected ?string $userId;
    protected ?string $sessionId;
    protected array|null $tags;
    protected string|null $browser_agent;
    protected string $ip_address;

    public function __construct(string $item_name,string $item_id,string $rating,
                                string $ip_address,
                                ?string $browser_agent=null,
                                ?array $tags = [],
                                ?string $userId = "",
                                ?string $sessionId = "",
    )
    {
        $this->extracted($this,$item_name,$item_id,$rating,$ip_address,$browser_agent,$tags,$userId,$sessionId);

        $object["item_name"] = $item_name;
        $object["item_id"] = $item_id;
        $object["rating"] = $rating;
        $object["userId"] = $userId;
        $object["sessionId"] = $sessionId;
        $object["tags"] = $tags;

        parent::__construct($userId,$sessionId,$tags,$browser_agent,$ip_address,
                            date('Y-m-d\TH:i:s'), "ta_web", "submit_item_ratings", $object);
    }

    public function extracted(object $object,string $item_name,string $item_id,string $rating,string $ip_address,?string $browser_agent=null,
                              ?array $tags=[],?string $userId="",?string $sessionId=""): void
    {
        $object->item_name = $item_name;
        $object->item_id = $item_id;
        $object->rating = $rating;
        $object->userId = $userId;
        $object->sessionId = $sessionId;
        $object->tags = $tags;
        $object->browser_agent = $browser_agent;
        $object->ip_address = $ip_address;
    }
}
