include .env

export
.PHONY: regenerate upgrade backup

default: status

status:
	docker ps

up3.2:
	./upgrader -o up -f 3.1 -t 3.2

down3.2:
	./upgrader -o down -f 3.1 -t 3.2

regenerate3.2:
	./upgrader -o regenerate -f 3.1 -t 3.2

upgrade3.2:
	@echo "Running upgrade to OJS 3.2 for $(PROJECT_NAME)..."
	./upgrader -o upgrade -f 3.1 -t 3.2

up3.3:
	./upgrader -o up -f 3.2 -t 3.3

down3.3:
	./upgrader -o up -f 3.2 -t 3.3

regenerate3.3:
	./upgrader -o regenerate -f 3.2 -t 3.3

upgrade3.3:
	./upgrader -o upgrade -f 3.2 -t 3.3

backup:
	docker exec -w $(DUMP_DIR) -it $(PROJECT_NAME)_mysql sh -c "cd $(DUMP_DIR) && mysqldump -uroot -p$(ROOT_PASSWORD) $(DATABASE_NAME) > $(DATABASE_NAME)_backup.sql"

bash-mysql:
	docker exec -it $(PROJECT_NAME)_mysql /bin/bash

bash-php:
	docker exec -it $(PROJECT_NAME)_web /bin/bash

