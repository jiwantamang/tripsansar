<?php

namespace frontend\models;

use yii\base\Model;

class RoomModel extends Model{

 public $rooms = [];
 public $floor;
 public $room_number;
 public $has_conditioner;
 public $has_tv;
 public $has_phone;
 public $available_from;
 public $price_per_day;
 public $description;
 public $hotel_id;
 public $room_type_id;
 public $checked = false;
 public $customer_id;
 public $transaction_id;

}