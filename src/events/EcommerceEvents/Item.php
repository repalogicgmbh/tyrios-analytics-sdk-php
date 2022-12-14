<?php
namespace repalogic\tyrios\analytics\events\EcommerceEvents;

class Item
{
    public string $item_id;
    public string $item_name;
    public ?string $affiliation;
    public ?string $currency;
    public ?array $tags;
    public ?float $discount;
    public ?int $index;
    public ?string $item_brand;
    public array $item_categories;
    public ?string $item_list_id;
    public ?string $item_category_id;
    public ?string $item_list_name;
    public ?string $item_variant;
    public string $item_group;
    public ?string $item_season;
    public float $price;
    public int $quantity;

    /**
     * @param $item_id
     * @param $item_name
     * @param $affiliation
     * @param $currency
     * @param $tags
     * @param $discount
     * @param $index
     * @param $item_brand
     * @param $item_categories
     * @param $item_list_id
     * @param $item_category_id
     * @param $item_list_name
     * @param $item_variant
     * @param $item_group;
     * @param $item_season;
     * @param $price
     * @param $quantity
     */
    public function __construct(string $item_id,string $item_name, array $item_categories,float $price,int $quantity,string $item_group,
                                string $item_season="",array $tags = [],string $affiliation = "",string $currency = "",float $discount = 0,
                                int $index = null, $item_brand = "",string $item_list_id = "",string $item_category_id="",
                                string $item_list_name="",string $item_variant = "" )
    {
        $this->item_id = $item_id;
        $this->item_name = $item_name;
        $this->affiliation = $affiliation;
        $this->currency = $currency;
        $this->tags = $tags;
        $this->discount = $discount;
        $this->index = $index;
        $this->item_brand = $item_brand;
        $this->item_categories = $item_categories;
        $this->item_list_id = $item_list_id;
        $this->item_category_id = $item_category_id;
        $this->item_list_name = $item_list_name;
        $this->item_variant = $item_variant;
        $this->item_season = $item_season;
        $this->item_group = $item_group;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}
