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

Laravel uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.
But if you don't use auto-discovery, open the `config/app.php` file and add the following line to register the service provider:
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
- To Sql with bindings.

### Table comment
Add a comment to a table (MySQL/PostgreSQL).
Use the method `comment` in your Blueprint object, like:
```php
<?php
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

To remove the table comment, use `removeComment()` method:
```php
<?php
Schema::table('users', function (Blueprint $table) {
    $table->removeComment();
});
```

### To Sql with bindings
You can use the `toSqlWithBindings()` method to print your SQL with bindings (obviously). See this example:

```php
<?php
$query = Course::where('price', '>', $request->price)
    ->where('rating', '>=', $request->min_rating)
    ->where('rating', '<=', $request->max_rating);

dd($query->toSql(), $query->toSqlWithBindings());

// toSql(): "select * from "courses" where "price" > ? and "rating" >= ? and "rating" <= ?"
// toSqlWithBindings(): "select * from "courses" where "price" > 100.0 and "rating" >= 4.3 and "rating" <= 5.0"
```

## Contributing
Contributions are more than welcome. Fork, improve and make a pull request. For bugs, ideas for improvement or other, please create an [issue](https://github.com/alvarofpp/laravel-expand-database/issues).
