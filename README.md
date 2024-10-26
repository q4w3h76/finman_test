# finman

Install and usage
```
git clone https://github.com/q4w3h76/finman_test
cd finman_test
cat .env.example >> .env
docker-compose up -d
docker exec -it FinMan-test_app make init
docker exec -it FinMan-test_app make migrate
```
App can be opened on localhost:8100, a test user was created with email: test@test.com and password: password
