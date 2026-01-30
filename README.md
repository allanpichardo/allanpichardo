# Hi! 👋
I'm Allan and I'm a creative technologist.

## Dockerized WordPress (Theme Development)

This repository is a WordPress theme. The Docker setup mounts this directory as a theme inside a WordPress container and includes Redis for object caching.

### Quick start

1) Create a local env file:

```bash
cp .env.example .env
```

2) Start the stack:

```bash
docker compose up -d
```

3) Open the installer:

```
http://localhost:8080
```

4) Activate the theme in wp-admin:
- Appearance → Themes → "Allan Pichardo"

### Optional: automate install + theme + Redis cache

Run the WP-CLI helper (uses values from `.env`):

```bash
docker compose --profile tools up --exit-code-from wpcli
```

### Notes
- Theme path inside the container: `/var/www/html/wp-content/themes/allanpichardo`
- If you rename the folder, update `WP_THEME_SLUG` in `.env` to match.
- Redis is enabled via `WP_REDIS_*` constants in `wp-config.php` (set by the container).
- Update versions, ports, and credentials in `.env` as needed.
