<?php

namespace App\Controller;

use GRPC\Catalog\CatalogClient;
use GRPC\Catalog\CatalogItemRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class BasketController extends AbstractController
{
    private CatalogClient $catalogClient;
    private SerializerInterface $serializer;

    public function __construct(CatalogClient $catalogClient, SerializerInterface $serializer)
    {
        $this->catalogClient = $catalogClient;
        $this->serializer = $serializer;
    }

    #[Route('/api/basket/items', name: 'basket', methods: ['POST'])]
    public function addBasketItem(Request $request): JsonResponse
    {
        $request = json_decode($request->getContent(), true);
        $response = $this->catalogClient->GetItemById((new CatalogItemRequest())->setId($request['itemId']));
        return new JsonResponse($this->serializer->normalize($response->wait()[0]));
    }
}
