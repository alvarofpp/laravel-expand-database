# expand-database
[![Packagist Version](https://img.shields.io/packagist/v/alvarofpp/expand-database)](https://packagist.org/packages/alvarofpp/expand-database)
[![License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](https://github.com/alvarofpp/laravel-expand-database/blob/master/LICENSE)

A package to make your database more powerful.

## Contents
  - [Install](#install)
  - [Usage](#usage)
  - [Contributing](#contributing)

## Install
Install via composer:
```bash
composer require alvarofpp/expand-database
```

Open the `config/app.php` file and add the following line to register the service provider:
```php
'providers' => [
    // ...

    Alvarofpp\ExpandDatabase\ExpandDatabaseServiceProvider::class,

    // ...
],
```

## Usage
This package currently contains:
- Table comment (MySQL/PostgreSQL).

### Table comment
Add a comment to a table (MySQL/PostgreSQL).
Use the method `comment` in your Blueprint object, like:
```php
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->rememberToken();
    $table->timestamps();

    $table->comment('Stores users');
});
```

To remove the table comment, just set a empty string in the method:
```php
Schema::table('users', function (Blueprint $table) {
    $table->comment('');
});
```

## Contributing
Contributions are more than welcome. Fork, improve and make a pull request. For bugs, ideas for improvement or other, please create an [issue](https://github.com/alvarofpp/laravel-expand-database/issues).
