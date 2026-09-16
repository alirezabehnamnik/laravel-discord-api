# Working Rules — Reysa Discord API

A Laravel package (`reysa/discord-api`) wrapping Discord's HTTP REST API. Static facade
(`DAPI::method(...)`), no controllers/views/migrations of its own — it's a library, published
to Packagist, consumed by other Laravel apps via Composer.

Read this file before making changes here.

---

## 1. Structure — know which layer you're editing

- `src/DAPI.php` — the original 14 hand-written convenience methods (guild invites, roles,
  DMs, channel messages). These predate the full-coverage rewrite and are kept for backward
  compatibility with existing consumers of the package. Also defines the two shared helpers
  every trait depends on: `client()` (authorized `Http` instance) and `baseUrl()`
  (`https://discord.com/api/v10`).
- `src/Concerns/*.php` — 21 traits, ~200 methods, one per Discord resource (Guilds, Channels,
  Messages, Users, Webhooks, Emojis, Stickers, Invites, Application Commands, Interactions,
  Audit Log, Auto Moderation, Scheduled Events, Stage Instances, Soundboard, Monetization,
  OAuth2, Voice). All composed into `DAPI` via `use`.
- `config/discord-api.php` — `bot_token`, `guild_id`, plus OAuth2 app credentials
  (`client_id`/`client_secret`/`redirect_uri`, only needed for the OAuth2 flow methods).
- `docs/openapi.yaml` — OpenAPI 3.0 spec covering every wrapped endpoint, generated from the
  official Discord docs source (titles, descriptions, and real example payloads where Discord's
  own docs provide one).
- `harness/` + `docker-compose.yml` + `docker/app.Dockerfile` — a disposable Laravel app used
  only for manual testing (see §4). Not part of the published package.

## 2. How the trait files came to be — don't hand-edit them into inconsistency

`src/Concerns/*.php` were generated from a manifest built directly from
`github.com/discord/discord-api-docs` (the official docs source), one method per documented
endpoint, named after Discord's own endpoint titles (e.g. "Get Guild Channels" →
`getGuildChannels()`). This is why:

- Every generated method takes a generic `array $data = []` (POST/PUT/PATCH) or
  `array $query = []` (GET) — payloads are passed through to Discord as-is, no per-field
  validation. This matches the original package's stated philosophy, not an oversight.
- Endpoints already covered by the original 14 hand-written methods on `DAPI.php` were
  deliberately **not** duplicated in the traits (e.g. "Add/Remove Guild Member Role" — see
  `giveRole`/`removeRole` instead).
- If you add a genuinely new Discord endpoint by hand, match this convention: method name from
  the endpoint's official title, docblock with the one-line description + `VERB /path`, body via
  `self::client()->verb(self::baseUrl() . "/path", $data)`.

## 3. Known intentional behavior (don't "fix" these without asking)

- **`giveRole`/`removeRole` return `Response[]` keyed by role ID, not a single `Response`.**
  Discord's role-add/remove endpoints only accept one role per call — there is no bulk variant.
  This was a deliberate breaking change from the original single-`Response` version; see
  `README.md`'s API reference for the documented shape.
- **Gateway (WebSocket) and Discord Social SDK/Lobby endpoints are out of scope.** Different
  protocol/product from the HTTP REST surface this package wraps.
- API calls are pinned to **v10** — don't silently drop back to unversioned or `v9` paths.

## 4. Testing changes — use the Docker harness, not guesswork

```bash
cp harness/.env.example harness/.env   # first time only; fill in DISCORD_BOT_TOKEN / GUILD_ID
docker compose up -d --build           # --build only needed after touching composer.json/Dockerfile
```

- `http://localhost:8080` — harness Laravel app. Requires this package via a **local path
  dependency**, live-mounted (`docker-compose.yml` binds `src/` and `config/` into the
  container), so edits to `src/**/*.php` are picked up without rebuilding.
- `http://localhost:8081` — Swagger UI reading `docs/openapi.yaml`, "Try it out" hits the
  harness above, which hits the real Discord API.
- Editing `harness/routes/discord.php` or `docker/app.Dockerfile` **does** need
  `docker compose up -d --build` to take effect (routes/Dockerfile aren't live-mounted).
- `harness/.env` is gitignored — never commit real bot tokens/secrets there.
- Before claiming a change works: hit the relevant route (curl or Swagger UI) and confirm the
  response, don't assume from reading the code.

## 5. Simplicity & scope

- No new abstractions beyond the trait-per-resource split already in place. If a change needs
  something heavier (e.g. typed DTOs instead of raw arrays), propose it and get confirmation
  first rather than introducing it inline with an unrelated fix.
- Don't touch `harness/` app internals (it's a throwaway Laravel skeleton generated at Docker
  build time) beyond `harness/routes/discord.php` and `harness/.env.example`.
- Match the existing docblock style in generated trait files (title, description, `VERB /path`,
  `@return`) for any endpoint you add by hand.
- If you notice an endpoint Discord has added since this was generated, it's fine to add it by
  hand following the convention in §2 — no need to regenerate everything.

## 6. Git & publishing

- `composer.json` has a `"version": "1.0.0"` field solely so the Docker harness's path-repository
  dependency resolves without ambiguity — this is not necessarily the version that should be
  tagged/published to Packagist; treat it as harness plumbing, not a release decision.
- Don't bump/publish a release, force-push, or commit `harness/.env` — check with the user first.

## Self-Check

These rules are working if: `src/DAPI.php`'s 14 original methods stay untouched in behavior
unless a change is explicitly requested, new endpoints follow the generated-trait convention,
and every change is verified against the running Docker harness before being called done.
