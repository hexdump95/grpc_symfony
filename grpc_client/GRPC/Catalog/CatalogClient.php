<?php
// GENERATED CODE -- DO NOT EDIT!

namespace GRPC\Catalog;

/**
 */
class CatalogClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \GRPC\Catalog\CatalogItemRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetItemById(\GRPC\Catalog\CatalogItemRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/CatalogApi.Catalog/GetItemById',
        $argument,
        ['\GRPC\Catalog\CatalogItemResponse', 'decode'],
        $metadata, $options);
    }

}
