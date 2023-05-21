<?php

namespace App\Http\Services\CardCollection;

use App\Http\Helpers\FileHandler\FileHandlerHelper;
use Illuminate\Routing\Controller as BaseController;
use stdClass;

class CardCollectionService extends BaseController
{
    private $fileHandler;
    private $fileName = 'mycollection';
    public $propertySeparator = '****';
    public $registerSeparator = '////';
    public $arraySeparator = ',,,,';

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

        if (isset($content) && trim($content) !== '') {
            return $this->cardListToArray($content);
        }

        return '';
    }

    private function cardListToArray($content)
    {
        $splitRegisters = explode($this->registerSeparator, trim($content));

        $splitRegistersVerified = array_filter($splitRegisters, function ($item) {
            return (trim($item) !== "" && preg_match("/[a-z]/i", $item));
        });

        $splitCards = array_map(function ($item) {
            $registerProperties = explode($this->propertySeparator, $item);

            $data = new stdClass();
            $data->utility = $this->stringToArray($registerProperties[0]);
            $data->name = $registerProperties[1];
            $data->cmc = $registerProperties[2];
            $data->colors = $this->stringToArray($registerProperties[3]);
            $data->type = $registerProperties[4];
            $data->rarity = $registerProperties[5];
            $data->power = $registerProperties[6];
            $data->toughness = $registerProperties[7];
            $data->imageUrl = $registerProperties[8];
            $data->quantity = $registerProperties[9];

            return $data;
        }, $splitRegistersVerified);

        return $splitCards;
    }

    public function cardObjectToString($content)
    {
        $utility = $this->stringArrayToString($content->utility);
        $name = $content->name;
        $cmc = $content->cmc;
        $colors = $this->stringArrayToString($content->colors);
        $type = $content->type;
        $rarity = $content->rarity;
        $power = $content->power;
        $toughness = $content->toughness;
        $imageUrl = $content->imageUrl;
        $quantity = $content->quantity;

        $cardContent = $utility . $this->propertySeparator . $name . $this->propertySeparator . $cmc . $this->propertySeparator . $colors . $this->propertySeparator . $type . $this->propertySeparator . $rarity . $this->propertySeparator . $power . $this->propertySeparator . $toughness . $this->propertySeparator . $imageUrl . $this->propertySeparator . $quantity;

        return $cardContent;
    }

    public function cardObjectArrayToString($content)
    {
        if(!$content || count($content) === 0){
            return '';
        }

        $stringDataArray = array_map(function($item){
            return $this->cardObjectToString($item);
        }, $content);

        return implode($this->registerSeparator, $stringDataArray);
    }

    private function stringArrayToString($content)
    {
        if(isset($content)){
            return implode($this->arraySeparator, $content);
        }
    }

    private function stringToArray($content)
    {
        return explode($this->arraySeparator, $content);
    }
}
