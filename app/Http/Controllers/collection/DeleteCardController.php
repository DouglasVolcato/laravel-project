<?php

namespace App\Http\Controllers\collection;

use App\Http\Services\CardCollection\CardCollectionService;
use Illuminate\Routing\Controller as BaseController;

class DeleteCardController extends BaseController
{
    private $cardCollectionService;

    public function __construct(CardCollectionService $cardCollectionService)
    {
        $this->cardCollectionService = $cardCollectionService;
    }

    public function deleteCard($request)
    {
        $cardIndex = $request->index;

        $fileContent = $this->cardCollectionService->getContent();
        array_splice($fileContent, $cardIndex);

        $this->cardCollectionService->setContent($fileContent);

        return;
    }
}
