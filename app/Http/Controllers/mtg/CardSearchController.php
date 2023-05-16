<?php
namespace app\Http\Controllers\mtg;

use App\Http\Helpers\RequestSender\RequestSenderHelper;
use Illuminate\Routing\Controller as BaseController;

class CardSearchController extends BaseController
{
    private $requestSender;
    private $apiLink;

    public function __construct()
    {
        $this->requestSender = new RequestSenderHelper();
        $this->apiLink = 'https://api.magicthegathering.io/v1/cards';
    }

    public function getCards($page = 1)
    {
        $apiLink = "{$this->apiLink}?page={$page}";
        $data = $this->requestSender->get($apiLink);

        $cards = json_decode($data)->cards;

        return $cards;
    }

}
