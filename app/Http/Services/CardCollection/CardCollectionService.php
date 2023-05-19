<?php

namespace App\Http\Services\CardCollection;

use App\Http\Helpers\FileHandler\FileHandlerHelper;
use Illuminate\Routing\Controller as BaseController;
use stdClass;

class CardCollectionService extends BaseController
{
    private $fileHandler;
    private $fileName = 'mycollection';
    public $propertyDivider = '****';
    public $registerDivider = '////';

    public function __construct(FileHandlerHelper $fileHandler)
    {
        $this->fileHandler = $fileHandler;
    }

    public function setContent($content)
    {
        return $this->fileHandler->setContent($this->fileName, $content);
    }

    public function getContent()
    {
        $content =  $this->fileHandler->getContent($this->fileName);

        return $this->cardListToArray($content);
    }

    private function cardListToArray($content)
    {
        $splitRegisters = explode($this->registerDivider, $content);
        $splitCards = array_map(function ($item) {
            $registerProperties = explode($this->propertyDivider, $item);

            $data = new stdClass();
            $data->utility = $registerProperties[0];
            $data->name = $registerProperties[1];
            $data->cmc = $registerProperties[2];
            $data->colors = $registerProperties[3];
            $data->type = $registerProperties[4];
            $data->rarity = $registerProperties[5];
            $data->power = $registerProperties[6];
            $data->toughness = $registerProperties[7];
            $data->imageUrl = $registerProperties[8];
            $data->quantity = $registerProperties[9];

            return $data;
        }, $splitRegisters);

        return $splitCards;
    }

    public function cardObjectToString($content)
    {
        $utility = $content->utility;
        $name = $content->name;
        $cmc = $content->cmc;
        $colors = $content->colors;
        $type = $content->type;
        $rarity = $content->rarity;
        $power = $content->power;
        $toughness = $content->toughness;
        $imageUrl = $content->imageUrl;
        $quantity = $content->quantity;

        $cardContent = $utility . $this->propertyDivider . $name . $this->propertyDivider . $cmc . $this->propertyDivider . $colors . $this->propertyDivider . $type . $this->propertyDivider . $rarity . $this->propertyDivider . $power . $this->propertyDivider . $toughness . $this->propertyDivider . $imageUrl . $this->propertyDivider . $quantity;

        return $cardContent;
    }
}
