<?php

namespace repalogic\tyrios\analytics\events\EcommerceEvents;

use repalogic\tyrios\analytics\data\BasicEvent;
use repalogic\tyrios\analytics\data\SystemInformation;
use stdClass;

class ViewItem extends BasicEvent
{
    protected string $currency;
    protected string $value;
    protected Item $item;
    protected array $tags;
    protected ?string $userId;
    protected ?string $sessionId;


    public function __construct(string $currency, string $value, Item $item, array $tags = [],
                                string $userId = "",
                                string $sessionId = "",
    )
    {
        $this->extracted($currency, $this, $value, $tags, $userId,  $item, $sessionId);

        $object = new stdClass();

        $this->extracted($currency, $object, $value, $tags, $userId,  $item, $sessionId);

        $browser_agent = $_SERVER['HTTP_USER_AGENT'] ?? null;
        $ip_address = anonymizeIP($_SERVER['REMOTE_ADDR']) ?? null;
        parent::__construct(date('Y-m-d H:i:s'), "ta_web", "view_item", $object,$userId,$sessionId,$tags,$browser_agent,$ip_address);
    }

    public function toJsonStruct(): array
    {
        $this->attributes["userId"] = $this->userId;
        $this->attributes["currency"] = $this->currency;
        $this->attributes["value"] = $this->value;
        $this->attributes["tags"] = $this->tags;
        $this->attributes["item"] = $this->item;
        $this->attributes["systemInformation"] = SystemInformation::getSystemInfo();
        return parent::toJsonStruct();
    }

    /**
     * @param string $currency
     * @param stdClass $object
     * @param string $value
     * @param array|null $tags
     * @param string|null $userId
     * @param Item $item
     * @param string|null $sessionId
     * @return void
     */
    public function extracted(string $currency, object $object, string $value, ?array $tags, ?string $userId,  Item $item, ?string $sessionId): void
    {
        $object->currency = $currency;
        $object->value = $value;
        $object->tags = $tags;
        $object->userId = $userId;
        $object->item = $item;
        $object->sessionId = $sessionId;
    }

}

