<?php

namespace App\Http\Controllers\collection;

use App\Http\Requests\GetCardInfoRequest;
use App\Http\Services\CardCollection\CardCollectionService;
use Illuminate\Routing\Controller as BaseController;

class EditCardController extends BaseController
{
    private $cardCollectionService;

    public function __construct(CardCollectionService $cardCollectionService)
    {
        $this->cardCollectionService = $cardCollectionService;
    }

    public function editCard(GetCardInfoRequest $request)
    {
        $cardIndex = $request->index;

        $cardContent = $this->cardCollectionService->cardObjectToString($request);
        $fileContent = $this->cardCollectionService->getContent();

        if($fileContent){
            array_splice($fileContent, $cardIndex, 1, $cardContent);
        }

        $newFileContent = $this->cardCollectionService->cardObjectArrayToString($fileContent);

        $this->cardCollectionService->setContent($newFileContent);

        return redirect()->route('cardCollection');
    }
}
