# Laravel Blade with Sanctum Kit (BSK)

<a name="top" id="top" ></a>

A Laravel Blade Template with Sanctum Authentication built in.

*Based on the Blade & Breeze Starter Kit provided with Laravel versions before Laravel 12.*

Primarily used for teaching purposes at [North Metropolitan TAFE](https://northmetrotafe.wa.edu.au).

### Built With

[![PHP][Php.com]][Php-url]
[![Laravel][Laravel.com]][Laravel-url]
[![Livewire][Livewire.com]][Livewire-url]
[![Inertia][Inertia.com]][Inertia-url]
[![Sanctum][Sanctum.com]][Sanctum-url]
[![Tailwindcss][Tailwindcss.com]][Tailwindcss-url]

### Editor of choice

[![PhpStorm][PhpStorm.com]][PhpStorm-url]
[![JetBrains][JetBrains.com]][JetBrains-url]

## Repo Stats

[![Forks][-Forks-Shield]][-Forks-URL]
[![Issues][-Issues-Shield]][-Issues-URL]
[![Educational Community Licence][-Licence-Shield]][-Licence-URL]


<p align="right">(<a href="#top">🔝 Back to top</a>)</p>

## Description

A starter kit for Laravel based on Laravel's Blade templating engine, TailwindCSS v4, HyperUI components and FontAwesome
Free icons.

It contains three sections:

- **Web**:
    - Static Layout, Controller and Pages
- **Client**:
    - Authenticated User Layout and Pages
- **Admin**:
    - Administration Layout, Controller and Pages

The project is developed as a re-write of the "Retro Blade Kit" and "Base Blade Kit" also by Adrian Gould.

It provides a base template for the creation of a "SaaS" style application, omitting sections that may tie to a specific
vendor such as a payment system.

<p align="right">(<a href="#top">🔝 Back to top</a>)</p>

## Table of Contents

- [Badges](#built-with)
- [Description](#description)
- [Installation](#installation)
- [Extending the Kit](#extending-Kit)
- [Screenshots](#screenshots)
- [Tests](#tests)
- [Credits](#credits)
- [Contact](#contact)
- [Licence](#licence)

## Installation

Remember to run `composer install`, `php artisan migrate`, `php artisan 
key:generate` to make sure a key is generated, all tables are created, 
and packages correctly installed.

Alternatively, you may use `composer setup` to install all packages, 
set a key, migrate and other common Laravel setup steps (using `pnpm`
for Node.js package management). Using `composer setup-npm` will perform
the same process but using `npm` for package management.

### Via Laravel Herd

One-click install a new application using this starter kit through
[Laravel Herd](https://herd.laravel.com):

[![Install_with_Laravel_Herd][LaravelHerdCreate.com]][LaravelHerdCreate-url]

### Via the Laravel Installer

Create a new Laravel application using this starter kit through the
official [Laravel Installer](https://laravel.com/docs/12.x/installation#installing-php):

```bash
  laravel new my-app --using=adygcode/blade-sanctum-kit
```
to use PNPM in place of NPM use:

```bash
  laravel new my-app -pnpm --using=adygcode/blade-sanctum-kit
```

To install with Pest, PNPM, Livewire, initialise a git repo, SQLite, ...
(Typed in on a single command line):

```bash
  laravel new my-app --pnpm --git --database=sqlite \
    --pest --using=adygcode/blade-sanctum-kit 
```

In either case, you must replace `my-app` with the name of your project, 
using kebab-case. For example `duck-quack-paddle`.
<p align="right">(<a href="#top">🔝back to top</a>)</p>

### Post setup

The steps for post installation will depend on if you are a student.

#### What is `.env.dev`?

We provide a `.env.dev` file to use as a starter point for the application when developing.

This is because we have a setup script we execute for testing our student submissions that uses this file, and executes
steps to install the packages from scratch, set up a database (usually MariaDB or MySQL), set up the MAIL configuration
to use Mailpit, run migrations and seeders, and more.

#### Finishing the Set-up

> Remember that `app-name` is the name of the application you used when creating the project. It will be replaced by the
> project's name, for example `my-big-laravel-app`.

Switch into the project folder:

```shell
cd app-name
```

Execute the following steps to configure your development environment:

```shell
cp .env.dev .env
php artisan key:generate
php artisan migrate:fresh --seed
```

At this point you should be able to execute the development server.

#### Development Servers

We have expanded the default composer run scripts provided with Laravel.

We have included:

- `dev` for general use, no MailPit
- `dev-win` for windows users, with MailPit
- `dev-linux`, for macOS and Linux uses, with MailPit and Log Watching

##### Dev

Executes three scripts in parallel using the `concurrently` package.

- `php artisan serve`
- `php artisan queue:listen --tries=1`
- `npm run dev`

```shell
composer run dev
```

##### Dev-Win

This is for Windows users who are not using WSL or Docker.

Executes four scripts in parallel using the `concurrently` package.

- `php artisan serve`
- `php artisan queue:listen --tries=1`
- `npm run dev`
- `mailpit --smtp=0.0.0.0:2525`

```shell
composer run dev-win
```

##### Dev-Linux

This is for Linux and macOS users.

Ensure you have installed MailPit and Pail on your macOS/Linux system.

Executes five scripts in parallel using the `concurrently` package.

- `php artisan serve`
- `php artisan queue:listen --tries=1`
- `npm run dev`
- `mailpit --smtp=0.0.0.0:2525`
- `php artisan pail --timeout=0`

```shell
composer run dev-linux
```

##### PhpStan

PHPStan is a static analysis package for PHP. It has been wrapped for Laravel use.

Installation details are in the Extending Kit section.

The command executes:

- `phpstan analyse --memory-limit=2G`

```shell
composer run phpstan
```

<p align="right">(<a href="#top">🔝 Back to top</a>)</p>

## Extending Kit

If you wish to add packages for further functionality, then follow the usual documentation from each of their sites.

| Dev | Prod | Item                                                               | Purpose                                                                     |
|-----|------|--------------------------------------------------------------------|-----------------------------------------------------------------------------|
| ✔️  | ✔️   | [![Livewire][Livewire.com]][Livewire-url]                          | Laravel based dynamic pages with minimal JS                                 |
| ✔️  | ✔️   | [![Spatie Permission][SpatiePermission.com]][SpatiePermission-url] | Roles and Permissions                                                       |
| ✔️  | ✔️️  | [![Telescope][Telescope.com]][Telescope-url]                       | Application performance tracking and debugging. May be resource usage heavy |
| ✔️  | ❌    | [![DebugBar][DebugBar.com]][DebugBar-url]                          | In browser debug bar                                                        |
| ✔️  | ❌    | [![Laradumps][Laradumps.com]][Laradumps-url]                       | Debugging without dump and die                                              |
| ✔️  | ❌    | [![Larastan][Larastan.com]][Larastan-url]                          | Static analysis of code                                                     |
| ✔️  | ❌    | [![Pint][Pint.com]][Pint-url]                                      | Opinionated code formatting                                                 |

### Installation of Packages

After completing an installation with the starter kit, you may want to update or add extra packages.

Updating is always a good idea before getting into the development process. And it should also be completed whilst
development is progressing, but never on the main branch.

Adding additional packages will occur, usually as the development process is completed, again never on the main branch.

When updating or adding any package make sure you immediately run your tests to make sure nothing has got broken in the
upgrade/addition process.

#### Static Analysis for Laravel

Use during development.

```shell
composer require larastan/larastan --dev
```

The project has a base `phpstan.neon` configuration file in the project's root folder.

#### Pint Opinionated Code Formatting and Linter

Use during development

```shell
composer require laravel/pint --dev
```

#### Laradumps

Use during development only.

```shell
composer require laradumps/laradumps --dev
```

#### Debug Bar

Use during development only.

```shell
composer require barryvdh/laravel-debugbar --dev
```

#### Telescope

To use during development only:

```shell
composer require laravel/telescope --dev
```

If you wish to use this for development and production, remove the `--dev`:

```shell
composer require laravel/telescope
```

#### Livewire 4.0 BETA

```shell
composer require laravel/livewire
```

#### Spatie Permission

```shell
composer require spatie/laravel-permission
```

<p align="right">(<a href="#top">🔝 Back to top</a>)</p>

### Updating Packages

If you wish to make sure that the basics are complete, and upgrades are also completed then the following may assist...

#### Dry Run Updates

Before doing so, do a dry run to see what is updated:

```shell
composer update --dry-run
npm update --dry-run
```

#### Composer Package Updates

Afterwards, you may update individually using commands such as those below:

```shell
composer update laravel/laravel
composer update laravel/sanctum
composer update --dev roave/security-advisories:dev-latest
composer update --dev laravel/breeze
composer update --dev laravel/pint
composer update --dev pestphp/pest
composer update --dev pestphp/pest-plugin-laravel
```

Or you may attempt a complete update using:

```shell
composer update
```

### Node.js Package Updates

We have shown how to check for updates to the Node.js packages, and likewise you may update all the packages using a
single command:

```shell
npm update
```

<p align="right">(<a href="#top">🔝 Back to top</a>)</p>

## Screenshots

Below are sample pages from the kit.

### General Welcome/Home Page

![Product Screenshot Welcome Page][-Product-ScreenShot-1]

### Authenticated User Dashboard

![Product Screenshot Authenticated User Dashboard][-Product-ScreenShot-2]

### Admin Dashboard

![Product Screenshot Admin Dashboard][-Product-ScreenShot-3]

### About Page

![Product Screenshot About Page][-Product-ScreenShot-4]

### Privacy Policy Page

![Product Screenshot Privacy Policy Page][-Product-ScreenShot-5]


<p align="right">(<a href="#top">🔝 Back to top</a>)</p>

## Tests

TBD

<p align="right">(<a href="#top">🔝 Back to top</a>)</p>

## Credits

This template is built using:

- Font Awesome. (n.d.). Fontawesome.com. https://fontawesome.com
- Laravel - The PHP Framework For Web Artisans. (2011). Laravel.com. https://laravel.com
- Laravel Bootcamp - Learn the PHP Framework for Web Artisans. (n.d.).
  Bootcamp.laravel.com. https://bootcamp.laravel.com/
- PHP: Hypertext Preprocessor. (n.d.). Www.php.net. https://php.net
- Professional README Guide. (n.d.). Coding-Boot-Camp.github.io. Retrieved April 15, 2024,
  from https://coding-boot-camp.github.io/full-stack/github/professional-guide
- TailwindCSS. (2023). Tailwind CSS - Rapidly build modern websites without ever leaving your HTML.
  Tailwindcss.com. https://tailwindcss.com/
- Free Open Source Tailwind CSS v4 Components | HyperUI. (2025). HyperUI. https://www.hyperui.dev/
- Shields.io. (2025). Shields.io. https://shields.io/
- Simple Icons. (2025). Simpleicons.org. https://simpleicons.org/?q=simple
- Roave/SecurityAdvisories: Security advisories as a simple composer exclusion list, updated daily. (2025).
  GitHub. https://github.com/Roave/SecurityAdvisories

<p align="right">(<a href="#top">🔝 Back to top</a>)</p>

## Contact

Adrian Gould: Lecturer (ASL1), [North Metropolitan TAFE](https://northmetrotafe.wa.edu.au), Perth WA, Australia.

- GitHub Pages: [https://adygcode.github.io](https://adygcode.github.io)
- GitHub Repos: [https://github.com/AdyGCode](https://github.com/AdyGCode)
- Starter Kit Repo: [Blade Sanctum Starter Kit](https://github.com/AdyGCode/blade-sanctum-kit)

<p align="right">(<a href="#top">🔝 Back to top</a>)</p>

## Licence

The Laravel "Blade with Sanctum" Starter Kit is open-sourced software licensed under the MIT license.


<p align="right">(<a href="#top">🔝 Back to top</a>)</p>



---

<!-- General Items, Screenshots, et al -->
<!-- Screenshots stored in storage/app/public/kit-docs -->

[-Forks-Shield]: http://img.shields.io/github/forks/adygcode/blade-sanctum-kit.svg?style=for-the-badge

[-Forks-URL]: https://github.com/AdyGCode/blade-sanctum-kit/network/members

[-Issues-Shield]: http://img.shields.io/github/issues/adygcode/blade-sanctum-kit.svg?style=for-the-badge

[-Issues-URL]: https://github.com/adygcode/blade-sanctum-kit/issues

[-Licence-Shield]: https://img.shields.io/github/license/adygcode/blade-sanctum-kit.svg?style=for-the-badge

[-Licence-URL]: https://github.com/adygcode/blade-sanctum-kit/blob/main/License.md

[-Product-Screenshot-1]: public/kit-docs/screenshot-welcome.png

[-Product-Screenshot-2]: public/kit-docs/screenshot-authenticated.png

[-Product-Screenshot-3]: public/kit-docs/screenshot-admin.png

[-Product-Screenshot-4]: public/kit-docs/screenshot-about.png

[-Product-Screenshot-5]: public/kit-docs/screenshot-privacy.png

<!-- Product, Package, Framework, et al -->

[DebugBar-url]: https://laraveldebugbar.com

[DebugBar.com]: https://img.shields.io/badge/Laravel_Debugbar-eb4432?style=for-the-badge&logo=&logoColor=white

[Inertia-url]: https://inertiajs.com

[Inertia.com]: https://img.shields.io/badge/Inertia-9553E9?style=for-the-badge&logo=inertia&logoColor=white

[JetBrains-url]: https://jetbrains.com

[JetBrains.com]: https://img.shields.io/badge/JetBrains-000000?style=for-the-badge&logo=jetbrains&logoColor=white

[Laradumps-url]: https://laradumps.dev

[Laradumps.com]: https://img.shields.io/badge/Laradumps-fbc120?style=for-the-badge&logo=logo&logoColor=black

[Larastan-url]:https://github.com/larastan/larastan

[Larastan.com]: https://img.shields.io/badge/Larastan-3191d0?style=for-the-badge&logo=logo&logoColor=white

[Laravel-url]: https://laravel.com

[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white

[LaravelHerd-url]: https://laravel.com

[LaravelHerd.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white

[LaravelHerdCreate-url]: https://herd.laravel.com/new?starter-kit=adygcode/blade-sanctum-kit

[LaravelHerdCreate.com]: https://img.shields.io/badge/Install_with_Herd-FF2D20?style=for-the-badge&logo=laravel&logoColor=white

[Livewire-url]: https://livewire.laravel.com

[Livewire.com]: https://img.shields.io/badge/Livewire-4E56A6?style=for-the-badge&logo=livewire&logoColor=white

[Php-url]: https://inertiajs.com

[Php.com]: https://img.shields.io/badge/Php-777BB4?style=for-the-badge&logo=php&logoColor=white

[PhpStorm-url]: https://www.jetbrains.com/phpstorm/

[PhpStorm.com]: https://img.shields.io/badge/phpstorm-000000?style=for-the-badge&logo=phpstorm&logoColor=white

[Pint-url]: https://laravel.com/docs/pint

[Pint.com]: https://img.shields.io/badge/Pint-f49931?style=for-the-badge&logo=laravel&logoColor=black

[Sanctum-url]: https://laravel.com

[Sanctum.com]: https://img.shields.io/badge/Sanctum-4b92d6?style=for-the-badge&logo=laravel&logoColor=white

[SimpleIcons-url]: https://simpleicons.org

[SimpleIcons.com]: https://img.shields.io/badge/SimpleIcons-111111?style=for-the-badge&logo=simpleicons&logoColor=white

[SpatiePermission-url]: https://spatie.be/docs/laravel-permission/v6/introduction

[SpatiePermission.com]: https://img.shields.io/badge/Spatie_Permission-197593?style=for-the-badge&logo=logo&logoColor=white

[Tailwindcss-url]: https://tailwindcss.com

[Tailwindcss.com]: https://img.shields.io/badge/Tailwindcss-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white

[Telescope-url]: https://telescope.laravel.com

[Telescope.com]: https://img.shields.io/badge/Telescope-7760cb?style=for-the-badge&logo=laravel&logoColor=white
