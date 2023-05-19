<?php

namespace App\Http\Services\CardSearch;

use App\Http\Helpers\MtgApiConnection\MtgApiConnectionHelper;
use App\Http\Helpers\RequestSender\RequestSenderHelper;
use App\Http\Requests\CardListSearchParametersRequest;
use Exception;

class CardSearchService extends MtgApiConnectionHelper
{
    private $requestSender;

    public function __construct()
    {
        $this->requestSender = new RequestSenderHelper();
    }

    public function getCards(CardListSearchParametersRequest $request)
    {
        $searchParameters = $this->mountSearchParameters($request);

        return $this->getFromApi($searchParameters);
    }

    private function getFromApi($parameters)
    {
        try {
            $apiLink = $this->apiLink . $parameters;
            $data = $this->requestSender->get($apiLink);
            $cards = json_decode($data)->cards;

            return $cards;
        } catch (Exception $error) {
            return [];
        }
    }

    private function mountSearchParameters($request){
        $page = $request->page;
        $name = $request->name;

        $parameters = "?";

        if (isset($page)) {
            $parameters .= "page={$page}";
        } else {
            $parameters .= "page=1";
        }

        if (isset($name)) {
            $parameters .= "&name={$name}";
        }

        if (strlen($parameters) > 7) {
            $parameters .= "&pageSize=300";
        } else {
            $parameters .= "&pageSize=30";
        }

        return $parameters;
    }
}
