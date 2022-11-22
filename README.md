# Laravel
Developed with Laravel 9, Laravel Breeze, Tailwind CSS, Flowbite.

## Install
```
git clone https://github.com/arifbudimanarrosyid/arifcode.git
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
```
php artisan migrate:fresh --seed
```

## Login & Register
Register form default account type is_admin false
### Admin
> admin@admin.com
> password

### User
> user@user.com
> password


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
- [x] Middleware 'isAdmin' & Gate 'admin'
- [x] Light Mode, Dark Mode (Auto)
- [x] Home, Featured Posts
- [x] Blog, All Posts
- [ ] Guestbook
- [x] About Me
- [x] Gear
- [x] Dashboard
- [x] Auth
- [ ] Dashboard - Blog
- [x] Dashboard - Profile
- [ ] Dashboard - Posts
  - [ ] Create
  - [x] Read
  - [ ] Update
  - [ ] Delete
- [ ] Dashboard - Portofolio
  - [ ] Create
  - [ ] Read
  - [ ] Update
  - [ ] Delete
- [ ] Dashboard - Guestbook
  - [ ] Create
  - [ ] Read
  - [ ] Update
  - [ ] Delete
- [ ] Dashboard - Users
  - [ ] Create
  - [ ] Read
  - [ ] Update
  - [ ] Delete
