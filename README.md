# wad2

This repository now includes a lightweight PHP/MySQL back end for the Digital Strategy Internship Portal. Configure the API by setting `DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS`, and optionally `DB_PORT` in your server environment. The schema for the required tables is in `Website/api/schema.sql`.

Key endpoints (all JSON):
- `Website/api/auth.php` — register (`action: register`), login (`action: login`), logout (`action: logout`), and session check (`GET`).
- `Website/api/profile.php` — authenticated profile fetch (`GET`) and update (`PUT`).
- `Website/api/interviews.php` — authenticated interview listing (`GET`) and scheduling with conflict checks (`POST`).

Front-end pages `pages/auth/login.php`, `pages/student/signup-student.php`, and `pages/student/schedule.php` post directly to the PHP handlers to maintain live sessions without JSON fetch calls.
