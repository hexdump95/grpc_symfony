<?php

namespace App\GRPC;

use GRPC\Catalog\CatalogInterface;
use GRPC\Catalog\CatalogItemRequest;
use GRPC\Catalog\CatalogItemResponse;
use Psr\Log\LoggerInterface;
use Spiral\RoadRunner\GRPC;

class CatalogService implements CatalogInterface
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function GetItemById(GRPC\ContextInterface $ctx, CatalogItemRequest $in): CatalogItemResponse
    {
        $this->logger->info("Get item by id {$in->getId()}");

        if ($in->getId() <= 0) {
            throw new GRPC\Exception\GRPCException(
                "ID should be greater than 0",
                GRPC\StatusCode::FAILED_PRECONDITION
            );
        }

        return (new CatalogItemResponse())
            ->setId($in->getId())
            ->setName("Shoes")
            ->setPrice(400)
            ->setDescription("The best shoes!");
    }
}

