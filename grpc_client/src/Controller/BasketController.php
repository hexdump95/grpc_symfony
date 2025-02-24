<?php

namespace App\Controller;

use App\GRPC\CatalogClient;
use GRPC\Catalog\CatalogItemRequest;
use Spiral\RoadRunner\GRPC\Context;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BasketController extends AbstractController
{
    private CatalogClient $catalogClient;

    public function __construct(CatalogClient $catalogClient)
    {
        $this->catalogClient = $catalogClient;
    }

    #[Route('/api/basket/items', name: 'basket', methods: ['POST'])]
    public function addBasketItem(Request $request): JsonResponse
    {
        $request = json_decode($request->getContent(), true);
        $response = $this->catalogClient->GetItemById(new Context([]), (new CatalogItemRequest())->setId($request['itemId']));
        return new JsonResponse($response->serializeToJsonString(), Response::HTTP_OK, [], true);
    }
}

