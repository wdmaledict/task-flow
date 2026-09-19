# API Testing (Postman)

This folder contains a Postman collection that verifies the route-level `auth`/`guest` middleware in `Core/Router.php` behaves correctly across every protected route.

## What's covered

**Unauthenticated requests** (`Auth`, `Lists`, `Cards` folders) — confirm that every route marked `->auth()` redirects a logged-out visitor to `/login`, and that `->guest()` routes stay reachable when logged out.

**Authenticated requests** (`Authenticated` folder) — confirm the same routes actually succeed once a session exists, exercising the full request → middleware → controller → database path. Runs in this order: `Login` → `Lists` (store/update/delete) → `Cards` (store/move/update/delete) → `Logout`.

Each request has a `Tests` (Post-response Script) assertion, so the whole collection can be run with **Collection Runner** for a pass/fail summary instead of eyeballing responses.

`task-flow.postman_test_run.json` is a saved run report (18/18 passing) from the last full pass.

## Running it locally

1. Import `task-flow.postman_collection.json` into Postman.
2. Create a Postman **Environment** with two variables: `email` and `password`, set to the credentials of a user already registered in your local `task-flow` database (register one via the app first if needed).
3. Select that environment (top-right dropdown) before sending requests.
4. Make sure Herd is serving the site at `http://task-flow.test`.
5. Run the whole collection via `...` → **Run collection**. When running everything at once, uncheck the standalone `Auth > Login` request (it's a one-off manual check, not part of the sequence) — leave everything else checked, in the order shown.

## Notes

- `Cards - Move` sends a raw JSON body (`{"card_id": ..., "list_id": ...}`), matching how `controllers/cards/move.php` reads `php://input` — every other request uses `x-www-form-urlencoded`.
- `Lists - Delete` / `Cards - Delete` (and the corresponding `Update` requests) reference specific database IDs — these need to point at real, disposable records, since they'll actually modify data when run against a live database.
