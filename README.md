# gRPC with Symfony

## Start the gRPC Server

```bash
cd grpc_server
composer install
vendor/bin/rr get --location bin/
bin/rr serve -c .rr.dev.yaml --debug
```

## Start the gRPC Client

```bash
cd grpc_client
composer install
vendor/bin/rr get --location bin/
bin/rr serve -c .rr.dev.yaml --debug
```

## Test the endpoint
```bash
curl -X POST 'localhost:8081/api/basket/items' \
-H 'Content-Type: application/json' \
-d '{ "itemId": 50 }'
```

Response:
```json
{"id":50,"name":"Shoes","description":"The best shoes!","price":400}
```
