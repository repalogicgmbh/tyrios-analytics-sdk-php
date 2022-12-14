<?php

namespace repalogic\tyrios\analytics\events\EcommerceEvents;

use repalogic\tyrios\analytics\data\BasicEvent;
use repalogic\tyrios\analytics\data\SystemInformation;
use stdClass;

class SelectPromotion extends BasicEvent
{
    protected string $creative_name;
    protected string $creative_slot;
    protected string $promotion_id;
    protected string $promotion_name;
    protected array $items;
    protected string $coupon;
    protected array $tags;
    protected string $userId;
    protected string $sessionId;

    public function __construct(string $creative_name,
                                string $creative_slot,
                                string $promotion_id,
                                string $promotion_name,
                                array $items,
                                array $tags = [],
                                string $userId = "",
                                string $sessionId = "",
    )
    {
        $this->extracted($creative_name, $this, $creative_slot,$promotion_id,$promotion_name, $tags, $userId, $items, $sessionId);

        $object = new stdClass();

        $this->extracted($creative_name, $object, $creative_slot,$promotion_id,$promotion_name, $tags, $userId,  $items, $sessionId);

        $browser_agent = $_SERVER['HTTP_USER_AGENT'] ?? null;
        $ip_address = anonymizeIP($_SERVER['REMOTE_ADDR']) ?? null;
        parent::__construct(date('Y-m-d H:i:s'), "ta_web", "select_promotion", $object,$userId,$sessionId,$tags,$browser_agent,$ip_address);
    }

    public function extracted(string $creative_name, object $object, string $creative_slot,string $promotion_id, string $promotion_name,array $tags, string $userId, array $items, string $sessionId): void
    {
        $object->creative_name = $creative_name;
        $object->creative_slot = $creative_slot;
        $object->promotion_id = $promotion_id;
        $object->promotion_name = $promotion_name;
        $object->tags = $tags;
        $object->userId = $userId;
        $object->items = $items;
        $object->sessionId = $sessionId;
    }
}

