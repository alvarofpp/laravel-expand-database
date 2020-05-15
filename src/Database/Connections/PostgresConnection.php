<?php


namespace Alvarofpp\ExpandDatabase\Database\Connections;

use Alvarofpp\ExpandDatabase\Database\Schema\Grammars\PostgresGrammar;
use Alvarofpp\ExpandDatabase\Traits\CustomBlueprint;
use Illuminate\Database\PostgresConnection as BasePostgresConnection;

class PostgresConnection extends BasePostgresConnection
{
    use CustomBlueprint;

    /**
     * Get the default schema grammar instance.
     *
     * @return \Illuminate\Database\Grammar|\Illuminate\Database\Schema\Grammars\PostgresGrammar
     */
    protected function getDefaultSchemaGrammar()
    {
        return $this->withTablePrefix(new PostgresGrammar);
    }
}
