include .env

from=2.4
to=3.3

export
.PHONY: regenerate upgrade backup

default: status

status:
	docker ps | grep $(PROJECT_NAME)

up:
	./upgrader -o up -f $(from) -t $(to)

regenerate:
	./upgrader -o regenerate -f $(from) -t $(to)

upgrade:
	@echo "Running upgrade to OJS from ${from} to ${to} for $(PROJECT_NAME)..."
	./upgrader -o upgrade -f $(from) -t $(to)
down:
	./upgrader -o down -f ${from} -t ${to}

backup:
	docker exec -w $(DUMP_DIR) -it $(PROJECT_NAME)_mysql sh -c "cd $(DUMP_DIR) && mysqldump -uroot -p$(ROOT_PASSWORD) $(DATABASE_NAME) > $(DATABASE_NAME)_backup.sql"

bash-mysql:
	docker exec -it $(PROJECT_NAME)_mysql /bin/bash

bash-php:
	docker exec -it $(PROJECT_NAME)_web /bin/bash

