# Fifteen Link

**Repository**

`public` searsandrew/fifteen-link.git

**Framework**
* php: ^8.2
* laravel/framework: ^11.9

**Packages**
* bakame/laravel-domain-parser: ^1.3
* laravel/tinker: ^2.9
* shetabit/visitor: ^4.3
* symfony/http-client: ^7.1
* symfony/mailgun-mailer: ^7.1

**Features**
* [x] Create short link from pasted URL. URL is verified and checked against PhishTank.
* [x] Allow users to soft-delete link, making them invalid.
* [x] User account creation (Laravel Breeze + Blade).
* [x] Users can click a copy button to get shortened URL.
* [x] Track usage of link for both total and unique clicks.

**To-do**
* [ ] Use Alpine for copying link, with visual feedback that link has been copied.
* [ ] Allow user to edit reference ID (possible make this a paid feature?).
* [ ] Build an info page for the links showing stats, edit, etc.
* [ ] Get PhishTank API key and implement usage + non-usage.
* [ ] Add other blacklist checking service.
* [ ] Teams?

**Notes**
* Uses verified email addresses, so email service will need to be attached.
* PhishTank API key is defined in config, but never used in the system.
* Package bakame/laravel-domain-parser is still included, but not currently used as it was throwing false negatives on URL strings. It will probably be fully removed in the future.
