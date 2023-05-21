<?php

namespace App\Http\Controllers\collection;

use App\Http\Requests\DeleteCardRequest;
use App\Http\Services\CardCollection\CardCollectionService;
use Illuminate\Routing\Controller as BaseController;

class DeleteCardController extends BaseController
{
    private $cardCollectionService;

    public function __construct(CardCollectionService $cardCollectionService)
    {
        $this->cardCollectionService = $cardCollectionService;
    }

    public function deleteCard(DeleteCardRequest $request)
    {
        $cardIndex = $request->index;

        $fileContent = $this->cardCollectionService->getContent();

        if($fileContent){
            array_splice($fileContent, $cardIndex, 1);
        }

        $newFileContent = $this->cardCollectionService->cardObjectArrayToString($fileContent);

        $this->cardCollectionService->setContent($newFileContent);

        return redirect()->route('cardCollection');
    }
}
