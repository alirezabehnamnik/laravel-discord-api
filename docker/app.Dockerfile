FROM composer:2 AS composer_bin

FROM php:8.3-cli-alpine

RUN apk add --no-cache git unzip
COPY --from=composer_bin /usr/bin/composer /usr/bin/composer

WORKDIR /app
# This is a disposable local test harness, not a deployed app -- skip the
# advisory-blocking policy so create-project isn't blocked by advisories
# against framework versions that are otherwise valid installs here.
RUN composer config -g policy.advisories.block false
RUN composer create-project laravel/laravel . "^11.0" --prefer-dist --no-interaction

# Register this package as a local path dependency so the harness always
# runs against the real, current source in src/ (not a Packagist release).
COPY . /package
RUN composer config repositories.reysa-discord-api path /package \
 && composer require reysa/discord-api:"*" -W --no-interaction

COPY harness/routes/discord.php /app/routes/discord.php
RUN grep -q "require __DIR__.'/discord.php';" /app/routes/web.php \
    || echo "require __DIR__.'/discord.php';" >> /app/routes/web.php

# Default Laravel CORS config only covers api/*; our test routes live under
# /discord/* (see harness/config/cors.php for why).
COPY harness/config/cors.php /app/config/cors.php

EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
