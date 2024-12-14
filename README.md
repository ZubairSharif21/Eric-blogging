<p align="center"><a href="https://blog.bellawan.my.id" target="_blank"><img src="https://bellawan.my.id/img/favicon.png" width="100" alt="Bellawan Logo" style="box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);" /></a></p>
<a href="https://blog.bellawan.my.id" style="text-decoration: none;"><h1 align="center">BK Blog</h1></a>
<p align="center">
<img src="https://github.com/belankus/Eric Blog/blob/public/public/img/indonesia_round_icon_64.png" height="16" alt="Indonesian Flag" />
<a href="https://github.com/belankus/Eric Blog/blob/public/README_ID.md">Bahasa Indonesia</a>
</p>

## About Eric Blog

Eric Blog is a robust blog management system/content management system (CMS) that's built with Laravel framework.

Eric Blog is a reckless project created to express thoughts and ideas in an intuitive and fun way. Starting from a hobby and interest in blogging that began in 2010, where web technology has not advanced as fast as it is now. Blogspot and Wordpress were the starting point for all beginner bloggers, including me.

With the development of website technology, with many frameworks that make it easier to build a website from scratch, I tried to recreate my first blog that was still using the Blogspot platform.

You can visit this project real demo at [Eric Blog Website](https://blog.bellawan.my.id)

## Features

All of these features supported by powerful interactive build in dashboard.

### Basic Features

This whole app is a blog sytem. Developed and tailored for open source project. Our features available:

-   Post
-   Categories
-   Tags
-   Users
-   Comments

#### 1.1 Post Management

#### 1.2 Categories Management

#### 1.3 Tags Management

#### 1.4 Users Management (on going)

Users management simplify superadmin to manage all users in one page. Including grant special permission access to users.

Basic users role:

1. Superadmin (full control)
2. User (post content, comments)
3. Visitor (comments)

Special permissions to modify and moderate:

1. Posts
2. Categories
3. Tags
4. Users
5. Comments

#### 1.5 Comments Management (on going)

Users can interact with other in blog posts.

## Technologies

I'm proud to share some of the technologies I've used to create the Eric Blog app.

-   **[Laravel 10](#laravel)**
-   **[Livewire 3](#livewire)**
-   **[TailwindCSS 3](#tailwind)**
-   **[EditorJS 2](#editorjs)**

### Software Dependencies

| No  | Software                                   | Version |
| :-: | ------------------------------------------ | ------: |
| 1.  | [Laravel](#laravel)                        |   10.48 |
| 2.  | [Laravel - Livewire + AlpineJS](#livewire) |     3.4 |
| 3.  | [TailwindCSS](#tailwind)                   |   3.4.1 |
| 4.  | [EditorJS](#editorjs)                      |  2.28.2 |

### Laravel<a name="laravel"></a>

Laravel is a web application framework with expressive, elegant syntax. A web framework provides a structure and starting point for creating your application, allowing you to focus on creating something amazing while we sweat the details.

[Laravel documentation](https://laravel.com/docs/10.x/installation)

### Livewire + AlpineJS<a name="livewire"></a>

Laravel Livewire is a framework for building Laravel powered frontends that feel dynamic, modern, and alive just like frontends built with modern JavaScript frameworks like Vue and React.

[Livewire documentation](https://livewire.laravel.com/docs/quickstart)

### TailwindCSS<a name="tailwind"></a>

Rapidly build modern websites without ever leaving your HTML.

A utility-first CSS framework packed with classes like flex, pt-4, text-center and rotate-90 that can be composed to build any design, directly in your markup.

[TailwindCSS documentation](https://tailwindcss.com/docs/installation)

### EditorJS<a name="editorjs"></a>

Free block-style editor with a universal JSON output

Editor.js provides maximum power for developers and products staying focused on the end-user experience

[EditorJS documentation](https://editorjs.io/getting-started/)

## How to install

First you need to have these app installed on your computer: Git, PHP, and Composer. Clone this repo to your local machine.

```
git clone https://github.com/belankus/Eric Blog.git bkblog
```

Move to `bkblog` directory

```
cd bkblog
```

Install package needed by Composer

```
composer install
```

Create an .env and configure database connection

```
cp .env.example .env
```

Create new APP_KEY

```
php artisan key:generate
```

Do migrations, set your DB connection first in .env

```
php artisan migrate
```

Do Seeding Database (REQUIRED!)

```
php artisan db:seed --class=AllPoliciesSeeder
```

Create storage link to public directory

```
php artisan storage:link
```

Run your app at browser https://localhost

```
php artisan serve
```

Access Point Dashboard
`http://localhost/login`
Email : `superadmin@bellawan.my.id`
Password : `password`

**Note** :

1. This app needs SSL connection (https) by default, if you're not going to use https, please remove service `\App\Http\Middleware\ForceHttps::class` inside `app/Http/Kernel.php` at this line of code

```
$middlewareGroups = [
    'web' => [
        ...
        \App\Http\Middleware\ForceHttps::class
        ...
    ]
]
```

2. By default, file storage linked to folder `public/images`. if you prefer default setting, open `.env`, at `APP_DISK_LINK` please change `images` to `storage`

```
 APP_DISK_LINK=images
```

After doing some configuration, run command `php artisan storage:link`

## Acknowledgement

This project was inspired by some of these great people, if you're interested you can visit their channels:

-   **[Sandhika Galih (WPU Channel)](https://www.youtube.com/@sandhikagalihWPU)**
-   **[Parsinta](https://www.youtube.com/@parsinta)**
-   **[Kelas Terbuka](https://www.youtube.com/@KelasTerbuka)**
-   **[YeloCode](https://www.youtube.com/@yelocode)**

## License

The Eric Blog project is open-sourced software licensed under the [MIT license](LICENSE).
