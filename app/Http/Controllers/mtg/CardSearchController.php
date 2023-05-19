<?php

namespace App\Http\Controllers\mtg;

use App\Http\Helpers\MtgApiConnection\MtgApiConnectionHelper;
use App\Http\Requests\CardListSearchParametersRequest;
use App\Http\Services\CardSearch\CardSearchService;

class CardSearchController extends MtgApiConnectionHelper
{

    private $cardSearchService;

    public function __construct(CardSearchService $cardSearchService)
    {
        $this->cardSearchService = $cardSearchService;
    }

    public function showCardListView(CardListSearchParametersRequest $request)
    {
        $cards = $this->cardSearchService->getCards($request);

        return view('home', ['cards' => $cards]);
    }
}
