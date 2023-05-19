<?php

namespace App\Http\Controllers\collection;

use App\Http\Requests\CardListSearchParametersRequest;
use App\Http\Services\CardCollection\CardCollectionService;
use Illuminate\Routing\Controller as BaseController;

class AddCardController extends BaseController
{
    private $cardCollectionService;

    public function __construct(CardCollectionService $cardCollectionService)
    {
        $this->cardCollectionService = $cardCollectionService;
    }

    public function addCard(CardListSearchParametersRequest $request)
    {
        $cardContent = $this->cardCollectionService->cardObjectToString($request);
        $fileContent = $this->cardCollectionService->getContent();

        $newFileContent = $this->cardCollectionService->cardObjectArrayToString($fileContent) . $this->cardCollectionService->registerSeparator . $cardContent;

        $this->cardCollectionService->setContent($newFileContent);

        return view('cardRegistration');
    }

    public function showCardRegistrationView(){
        return view('cardRegistration');
    }
}
