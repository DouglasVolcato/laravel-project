<?php

namespace App\Http\Helpers\MtgApiConnection;

use Illuminate\Routing\Controller as BaseController;

class MtgApiConnectionHelper extends BaseController
{
    protected $apiLink = 'https://api.magicthegathering.io/v1/cards';
}
