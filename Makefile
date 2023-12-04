default: bash

bash:
	docker compose run --rm -it web bash

restart:
	docker compose restart


