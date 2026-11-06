# Vromon

A Bengali tourism platform that helps local communities in Bangladesh earn from tourism.

Vromon (ভ্রমণ) is built around one idea: the money that tourism brings should reach the people who live where tourists go. Local guides, drivers, home cooks, hotel and restaurant owners and small businesses can offer their services on the platform, get booked by travellers, build a reputation through reviews and even receive investment. Travellers, in turn, can plan and book a whole trip in one place. Everything on the site is in Bengali.

## Features

**For local communities**
- Offer services as a guide, driver, home cook or hotel owner
- Accept or decline service requests from travellers and earn from each completed service
- Register a local business and keep a public business profile
- Receive investment from people who want to support local businesses
- Build trust through verified services and traveller reviews

**For travellers**
- Plan a custom tour or book a ready-made tour package
- Book transport and hotels, and see restaurants and their menus
- Hire local guides and order homemade food from local families
- Follow an ongoing tour, then end or cancel it
- Browse places by type: hills, seas, cities and other spots
- Rate and review every service

**Trust and community**
- Inspectors visit and verify services before they are approved
- Blog and travel stories, comments, likes and questions
- Notifications for bookings, approvals and service requests

**Admin panel**
- Approve posts, tour packages and services
- Manage moderators, inspectors and platform rules
- Track incentives and records

## Built with

- PHP and MySQL
- HTML, CSS, JavaScript and Bootstrap
- AdminLTE for the admin panel
- PhpSpreadsheet for reading and writing Excel records

## Project structure

```
index.php, header.php, footer.php   main site pages and layout
*_process.php                       form handlers
admin/                              admin panel (AdminLTE)
inc/db.php                          database connection
css/, js/, font/, images/           site assets
text/                               Excel records the site reads and writes
uploads/                            files uploaded by users (kept empty here)
multiselect/, simplehtmldom/        third-party helpers
composer.json                       PHP dependencies
```

## Running it locally

1. Install XAMPP (or any PHP and MySQL setup) and copy this folder into `htdocs`.
2. Install the PHP dependencies:

```bash
composer install
```

3. Create a MySQL database named `tms`. The connection settings are in `inc/db.php`.
4. Open `http://localhost/<folder-name>/` in the browser.

The database schema is not part of this repository, so the tables need to be created before the site can store data.

## Related paper

The features of this platform are described in the paper "A practical framework to unlock business and employment opportunities for local communities in Bangladesh's tourism sector", presented at the 28th International Conference on Computer and Information Technology (ICCIT 2025) and published by IEEE.
[doi:10.1109/ICCIT68739.2025.11491495](https://doi.org/10.1109/ICCIT68739.2025.11491495)
