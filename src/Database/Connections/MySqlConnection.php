<?php


namespace Alvarofpp\ExpandDatabase\Database\Connections;

use Alvarofpp\ExpandDatabase\Database\Schema\Grammars\MySqlGrammar;
use Alvarofpp\ExpandDatabase\Traits\CustomBlueprint;
use Illuminate\Database\MySqlConnection as BaseMySqlConnection;

class MySqlConnection extends BaseMySqlConnection
{
    use CustomBlueprint;

    /**
     * Get the default schema grammar instance.
     *
     * @return \Illuminate\Database\Grammar|\Illuminate\Database\Schema\Grammars\MySqlGrammar
     */
    protected function getDefaultSchemaGrammar()
    {
        return $this->withTablePrefix(new MySqlGrammar);
    }
}
