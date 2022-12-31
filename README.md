# Laravel
Developed with Laravel 9, Laravel Breeze, Tailwind CSS, Flowbite.

## System Requirement
- Laravel 9 Support
- PHP >=8.0

## Install
```
git clone https://github.com/arifbudimanarrosyid/arifcode.git
```
```
composer install
```
```
npm install
```

make `.env` file & configure

```
php artisan key:generate
```
```
npm run dev
```
open new terminal
```
php artisan serve
```
```
php artisan migrate:fresh --seed
```

go to https://github.com/settings/developers and https://console.cloud.google.com/apis/credentials/oauthclient/, 
make OAuth Apps with Auth callback url http://localhost:8000/auth/callback/github and http://localhost:8000/auth/callback/google

add to '.env'
```
GITHUB_CLIENT_ID = 
GITHUB_CLIENT_SECRET = 
GOOGLE_CLIENT_ID = 
GOOGLE_CLIENT_SECRET = 
```

change 'services.php'
```
'github' => [
        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect' => '/auth/callback/github',
    ],
'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => '/auth/callback/google',
    ],
```

## Login & Register
Register form default account type is_admin false. You can sign in with Github or Google only with localhost url.

Check `DatabaseSeeder.php` for more seeded account.

### Admin
>email: admin@admin.com

>password: password

### User
>email: user@user.com

>password: password


## Site Screenshot
![home](screenshot/home.png)
![posts](screenshot/posts.png)
![singelpost](screenshot/singelpost.png)
![portofolio](screenshot/portofolio.png)
![gear](screenshot/gear.png)
![aboutme](screenshot/aboutme.png)

## Dashboard Screenshot
![dashboard](screenshot/dashboard.png)
![dashboardposts](screenshot/dashboardposts.png)

## Feature
- [x] Light Mode & Dark Mode (Auto)
- [x] Home - Featured Posts
- [x] Posts - All Posts
- [x] Show Single Post
- [x] Show Recomendation Posts on Single Post
- [x] Comment on Post
  - [x] Edit
  - [x] Delete 
  - [x] Report
  - [ ] Reply (Pending Feature)
- [x] Portofolio
- [x] Guestbook
  - [x] Create 
  - [x] Read 
  - [x] Update
  - [x] Delete 
  - [x] Pin (Admin)
  - [x] Unpin (Admin)
- [x] About Me
- [x] Gear


## Middleware & Gate

### Auth
- [x] Auth - Login & Register
- [x] Guestbook
  - [x] Create
  - [x] Read
  - [x] Update
  - [x] Delete
- [x] Dashboard
- [x] Profile

### Admin
- [x] Dashboard - Posts
  - [x] Create
  - [x] Read
  - [x] Update
  - [x] Delete & Update Thumbnail
  - [x] Delete
  - [x] Delete All Draft Posts (hidden if draft posts = 0)
- [x] Dashboard - Category
  - [x] Create
  - [x] Read
  - [x] Update
  - [x] Delete (hidden and disable by route)
- [x] Dashboard - Users
  - [x] Change role to Admin
  - [x] Change role to User
