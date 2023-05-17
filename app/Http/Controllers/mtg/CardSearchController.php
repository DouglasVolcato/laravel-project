<?php

namespace App\Http\Controllers\mtg;

use App\Http\Helpers\MtgApiConnection\MtgApiConnectionHelper;
use App\Http\Helpers\RequestSender\RequestSenderHelper;
use App\Http\Requests\CardListSearchParametersRequest;
use Exception;

class CardSearchController extends MtgApiConnectionHelper
{
    private $requestSender;

    public function __construct()
    {
        $this->requestSender = new RequestSenderHelper();
    }

    public function showCardListView(CardListSearchParametersRequest $request)
    {
        $page = $request->page;
        $name = $request->name;
        $cmc = $request->cmc;
        $colors = $request->colors;
        $types = $request->types;
        $supertypes = $request->supertypes;
        $rarity = $request->rarity;
        $text = $request->text;
        $power = $request->power;
        $toughness = $request->toughness;

        $parameters = "?";

        if (isset($page)) {
            $parameters .= "page={$page}";
        } else {
            $parameters .= "page=1";
        }

        if (isset($name)) {
            $parameters .= "&name={$name}";
        }

        if (isset($cmc)) {
            $parameters .= "&cmc={$cmc}";
        }

        if (isset($colors)) {
            $parameters .= "&colors={$colors}";
        }

        if (isset($types)) {
            $parameters .= "&types={$types}";
        }

        if (isset($supertypes)) {
            $parameters .= "&supertypes={$supertypes}";
        }

        if (isset($rarity)) {
            $parameters .= "&rarity={$rarity}";
        }

        if (isset($text)) {
            $parameters .= "&text={$text}";
        }

        if (isset($power)) {
            $parameters .= "&power={$power}";
        }

        if (isset($toughness)) {
            $parameters .= "&toughness={$toughness}";
        }

        if (strlen($parameters) > 7) {
            $parameters .= "&pageSize=300";
        } else {
            $parameters .= "&pageSize=30";
        }


        $cards = $this->getCards($parameters);

        return view('home', ['cards' => $cards]);
    }

    private function getCards($parameters)
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
}
