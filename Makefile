include .env

export
.PHONY: regenerate upgrade backup

default: status

status:
	docker ps

up:
	@docker-compose up

down:
	@docker-compose up

regenerate:
	@echo "Dropping database $(PROJECT_NAME)"
	docker exec -it $(PROJECT_NAME)_mysql  mysqladmin drop $(DATABASE_NAME) -uroot -p$(ROOT_PASSWORD)
	@echo "Generating database $(PROJECT_NAME)"
	docker exec -it $(PROJECT_NAME)_mysql mysqladmin create $(DATABASE_NAME) -uroot -p$(ROOT_PASSWORD)
	docker exec -w $(DUMP_DIR) -it $(PROJECT_NAME)_mysql sh -c "cd $(DUMP_DIR) && mysql -uroot -p$(ROOT_PASSWORD) $(DATABASE_NAME) < ./$(DUMP_FILE)"

upgrade:
	@echo "Running upgrade for $(PROJECT_NAME)..."
	docker exec -it $(PROJECT_NAME)_web sh -c "cd /app && php tools/upgrade.php upgrade" 

backup:
	docker exec -w $(DUMP_DIR) -it $(PROJECT_NAME)_mysql sh -c "cd $(DUMP_DIR) && mysqldump -uroot -p$(ROOT_PASSWORD) $(DATABASE_NAME) > $(DATABASE_NAME)_backup.sql"

bash-mysql:
	docker exec -it $(PROJECT_NAME)_mysql /bin/bash

bash-php:
	docker exec -it $(PROJECT_NAME)_web /bin/bash
