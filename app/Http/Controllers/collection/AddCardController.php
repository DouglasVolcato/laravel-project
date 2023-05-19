<?php

namespace App\Http\Controllers\collection;

use App\Http\Services\CardCollection\CardCollectionService;
use Illuminate\Routing\Controller as BaseController;

class AddCardController extends BaseController
{
    private $cardCollectionService;

    public function __construct(CardCollectionService $cardCollectionService)
    {
        $this->cardCollectionService = $cardCollectionService;
    }

    public function addCard($request)
    {
        $cardContent = $this->cardCollectionService->cardObjectToString($request);
        $fileContent = $this->cardCollectionService->getContent();
        $newFileContent = $fileContent . $this->cardCollectionService->registerDivider . $cardContent;

        $this->cardCollectionService->setContent($newFileContent);

        return;
    }
}
