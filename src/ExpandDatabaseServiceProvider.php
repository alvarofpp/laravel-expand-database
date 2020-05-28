<?php

namespace Alvarofpp\ExpandDatabase;

use Alvarofpp\ExpandDatabase\Database\Connections\MySqlConnection;
use Alvarofpp\ExpandDatabase\Database\Connections\PostgresConnection;
use Illuminate\Database\Connection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class ExpandDatabaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Connection::resolverFor('mysql', static function ($connection, $database, $prefix, $config) {
            return new MySqlConnection($connection, $database, $prefix, $config);
        });

        Connection::resolverFor('pgsql', static function ($connection, $database, $prefix, $config) {
            return new PostgresConnection($connection, $database, $prefix, $config);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Illuminate\Database\Eloquent\Builder::macro("toSqlWithBindings", function () {
            return Str::replaceArray('?', $this->getBindings(), $this->toSql());
        });
    }
}
