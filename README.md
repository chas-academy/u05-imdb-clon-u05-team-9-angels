# IMDB KLON U05 CHAS ACADEMY GRUPP 9

## Table of Contents

-   [Projekt](#projekt)
    -   [Mål](#mål)
    -   [Ackompanjerande kravspecifikation](#ackompanjerande-kravspecifikation)
    -   [Kravspec](#kravspec)
    -   [Inlämning](#inlämning)
-   [Getting Started](#getting-started)
    -   [Prerequisites](#prerequisites)
    -   [Get the project running](#get-the-project-running)
        -   [Cloning the project](#cloning-the-project)
        -   [Installing dependencies](#installing-dependencies)
        -   [Configuration](#configuration)
        -   [Database](#database)
        -   [Running the app](#running-the-app)

## Projekt

Den här uppgiften går ut på att i grupp implementera en fullständig webbplats som nyttjar en databas genom PHP. Temat för uppgiften är filmer och den resulterande webbplatsen ska fungera likt den populära sidan IMDb (International Movie Database).

### Mål

-   En webbplats skriven med PHP för backend, JS, HTML och CSS för front-end samt en databas i MySQL
-   Ska använda sig av PHP-ramverket Laravel
-   En MySQL databas med tabeller och data som är skapade via Laravel migrations
-   Webbplatsen ska ha tre olika typer av åtkomster (tänk RBAC, role-based access control)
    -   En publik del ska kunna besökas utan inloggning för vanliga besökare
    -   En inloggad del som då kräver registrering där man som användare:
        -   Ska kunna recensera filmer
        -   Se, skapa och ändra i listor med filmer som man vill se (se IMDb:s watchlist)
    -   En skyddad del, där endast en administratör kan logga in för att göra följande:
        -   Hantera recensioner och kommentarer (godkänna, ta bort)
        -   CRUD-operationer för filmer
        -   CRUD-operationer för användare
-   Design är också en del av uppgiften och skall skapas av teamet. Det är tillåtet att nyttja CSS-ramverk såsom Bootstrap eller dylikt.
-   Det är rekommenderat att teamet använder sig av GitHub Flow när ni versionshanterar
-   Det är rekommenderat att deploya ofta. Tänk igen på att dela upp er leverabel i så små delar som möjligt - Release often, deploy a lot
-   Övriga krav på arbetet
    -   I ert team ska ni arbeta agilt och dela upp arbetet i iterationer. Det är rekommenderat att att ni använder er av minst en-veckas "sprintar/cykler/iterationer"
    -   Strukturera ert arbete i små leverabler som ni i teamet är bekväma med att leverera
    -   Illustrera ert planerade, pågående och avslutade arbete med Kanban (digitalt eller fysiskt)
    -   Ni ska i teamet komma överens om kodningstandard och se till att samtliga i teamet följer den

### Ackompanjerande kravspecifikation

I dokumentet nedan finns det en lös kravspecifikation som ni i grupp ska nyttja under arbetets gång. Lägg märke till att där finns ytterligare icke-funktionella krav i denna specifikation (se sista sidan). I dokumentetet är där även specifierat vilka routes som förväntas vara tillgängliga, för att ge en uppfattning om hur allt ska struktureras.\
Där är även sektioner för personas och user stories som ni i gruppen måste utöka.\
Slutligen innehåller det även avsnitt för wireframes och en sitemap (se dokumentet för exempel på hur det kan se ut).

### Kravspec

https://docs.google.com/document/d/1kY206U6sYIu63MptUtyID6kKLp5pSk-tK75Nn5Tii2c/edit?usp=sharing

### Inlämning

Den färdiga inlämningen ska deployas så att den finns tillgänglig på webben (vi återkommer med förslag på ställen).\
Källkoden med versionshistorik ska finns länkad

## Getting Started

### Prerequisites

-   A Unix-like operating system: macOS, Linux. On Windows: WSL2 is recommended.
-   [PHP](https://www.php.net/) (version 7)
-   [MySQL](https://www.mysql.com/)
-   [`composer`](https://getcomposer.org/) should be installed
-   [`git`](https://git-scm.com/) should be installed

### Get the project running

#### Cloning the project

To clone the project, go to the terminal and type in:

```bash
git clone https://github.com/chas-academy/u05-imdb-clon-u05-team-9-angels.git
```

#### Installing dependencies

Run the `composer install` command in the root of your project directory to install all required dependencies.

**(Optional)**\
Run `npm install` if you intend to develop the app.

#### Configuration

You will need to create a `.env` file and configure it before running Laravel. There is a `.env.example` file you can use as template for the configuration.\
Type in the following command to make a copy of this file:

```bash
cp .env.example .env
```

Open up the `.env` file and put in your database configurations. These variables are prefixed with `DB`.

You will also need to generate an app key, type in:

```bash
php artisan key:generate
```

#### Database

We need to make a database migration before the app will be able to fetch and save data.

To make a database migration:

```bash
php artisan migrate
```

To wipe the database before migration:

```bash
php artisan migrate:fresh
```

We also provide a seeder to populate the database with data so you don't need to do it yourself. Just add a `--seed` flag at the end of the migration command, like this:

```bash
php artisan migrate:fresh --seed
```

#### Running the app

We will use Artisan command to start a local development server at `http://127.0.0.1:8000`:

```bash
php artisan serve
```
