SHELL := /bin/sh

COMPOSE := docker compose

.PHONY: help build up down restart logs ps clean install wpcli shell db redis

help:
	@printf "%s\n" \
	"Targets:" \
	"  build    Build WordPress image (if using a custom build)" \
	"  up       Start the stack in the background" \
	"  down     Stop the stack" \
	"  restart  Restart the stack" \
	"  logs     Follow logs" \
	"  ps       Show container status" \
	"  clean    Stop the stack and remove volumes" \
	"  install  Run WP-CLI installer + theme + Redis (profile tools)" \
	"  wpcli    Open an interactive WP-CLI shell (profile tools)" \
	"  shell    Open a shell in the WordPress container" \
	"  db       Open a MariaDB shell" \
	"  redis    Open a Redis CLI shell"

build:
	$(COMPOSE) build

up:
	$(COMPOSE) up -d

down:
	$(COMPOSE) down

restart:
	$(COMPOSE) down
	$(COMPOSE) up -d

logs:
	$(COMPOSE) logs -f --tail=200

ps:
	$(COMPOSE) ps

clean:
	$(COMPOSE) down -v

install:
	$(COMPOSE) --profile tools up --exit-code-from wpcli

wpcli:
	$(COMPOSE) --profile tools run --rm wpcli sh

shell:
	$(COMPOSE) exec wordpress sh

db:
	$(COMPOSE) exec db mysql -u"$${WORDPRESS_DB_USER}" -p"$${WORDPRESS_DB_PASSWORD}" "$${WORDPRESS_DB_NAME}"

redis:
	$(COMPOSE) exec redis redis-cli
