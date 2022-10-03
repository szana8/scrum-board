.PHONY: default

bash:
	docker exec -it laravel-scrum-board-workspace bash

up:
	docker-compose up -d
