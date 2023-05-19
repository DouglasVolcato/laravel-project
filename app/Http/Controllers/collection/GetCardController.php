<?php

namespace App\Http\Controllers\collection;

use App\Http\Services\CardCollection\CardCollectionService;
use Illuminate\Routing\Controller as BaseController;

class GetCardController extends BaseController {
    private $cardCollectionService;

    public function __construct(CardCollectionService $cardCollectionService)
    {
        $this->cardCollectionService = $cardCollectionService;
    }

    public function getOneCard($request)
    {
        $cardIndex = $request->index;
        $fileContent = $this->cardCollectionService->getContent();

        return $fileContent[$cardIndex];
    }

    public function getAllCards()
    {
        return $this->cardCollectionService->getContent();
    }
}
