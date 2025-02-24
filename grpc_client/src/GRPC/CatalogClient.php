<?php

namespace App\GRPC;

use Grpc\BaseStub;
use GRPC\Catalog\CatalogInterface;
use GRPC\Catalog\CatalogItemRequest;
use GRPC\Catalog\CatalogItemResponse;
use Grpc\ChannelCredentials;
use Spiral\RoadRunner\GRPC;

class CatalogClient extends BaseStub implements CatalogInterface
{

    public function __construct($hostname)
    {
        parent::__construct(
            $hostname,
            ['credentials' => ChannelCredentials::createInsecure()],
        );
    }

    public function GetItemById(GRPC\ContextInterface $ctx, CatalogItemRequest $in): CatalogItemResponse
    {
        [$response] = $this->_simpleRequest(
            '/' . self::NAME . '/GetItemById',
            $in,
            [CatalogItemResponse::class, 'decode'],
            (array)$ctx->getValue('metadata'),
            (array)$ctx->getValue('options')
        )->wait();
        return $response;
    }

}

