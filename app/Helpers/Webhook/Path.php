<?php

namespace App\Helpers\Webhook;

class Path
{
    protected $type;
    public function __construct(Type $type)
    {
        $this->type = $type->getType();
    }

    public function realization()
    {
        if($this->type == 'service_id')
        {
            return 'sendService';
        }
        elseif ($this->type == 'order_id')
        {
            return 'newOrder';
        }
        elseif ($this->type == 'signature'){
            return 'signature';
        }
        elseif($this->type == 'forward'){
            return 'answerMessage';
        }
        elseif($this->type == 'chatPost'){
            return 'chatPost';
        }
        elseif($this->type == 'forwardToUser')
        {
            return 'forwardToUser';
        }
        elseif ($this->type == 'geolocationUser'){
            return 'geolocationUser';
        }
        elseif ($this->type == 'geolocationDeliver'){
            return 'geolocationDeliver';
        }
        elseif($this->type == 'delivery'){
            return 'deliveryClose';
        }
    }
}
