<?php
# Generated by the protocol buffer compiler (roadrunner-server/grpc). DO NOT EDIT!
# source: src/proto/catalog.proto

namespace GRPC\Catalog;

use Spiral\RoadRunner\GRPC;

interface CatalogInterface extends GRPC\ServiceInterface
{
    // GRPC specific service name.
    public const NAME = "CatalogApi.Catalog";

    /**
    * @param GRPC\ContextInterface $ctx
    * @param CatalogItemRequest $in
    * @return CatalogItemResponse
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function GetItemById(GRPC\ContextInterface $ctx, CatalogItemRequest $in): CatalogItemResponse;
}
