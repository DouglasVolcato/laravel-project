<?php

namespace App\Http\Controllers\collection;

use App\Http\Services\CardCollection\CardCollectionService;
use Illuminate\Routing\Controller as BaseController;

class EditCardController extends BaseController
{
    private $cardCollectionService;

    public function __construct(CardCollectionService $cardCollectionService)
    {
        $this->cardCollectionService = $cardCollectionService;
    }

    public function editCard($request)
    {
        $cardIndex = $request->index;
        $cardContent = $this->cardCollectionService->cardObjectToString($request);

        $fileContent = $this->cardCollectionService->getContent();
        array_splice($fileContent, $cardIndex, $cardContent);

        $this->cardCollectionService->setContent($fileContent);

        return;
    }
}
