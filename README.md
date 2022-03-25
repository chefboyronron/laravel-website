# Version
- 7.6

# Prerequisites
1. NodeJS
2. Composer or Laravel Installer

# Installation

```
> composer create-project laravel/laravel:{VERSION} your_directory
```
# Running Application
```
> php artisan serve
```
# Migrate Specicfic File
```
> php artisan migrate:{OPTION} --path=./database/migrations/{FILE.php}
```

# Adding Records using Tinker Factory
```
> php artisan tinker
> factory(\App\{MODEL_NAME}::class, {NUMBER_OF_RECORD})->create();
```