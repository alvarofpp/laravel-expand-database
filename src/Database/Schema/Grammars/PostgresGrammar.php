<?php


namespace Alvarofpp\ExpandDatabase\Database\Schema\Grammars;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Grammars\PostgresGrammar as BasePostgresGrammar;
use Illuminate\Support\Fluent;

class PostgresGrammar extends BasePostgresGrammar
{
    /**
     * Compile a table comment command.
     *
     * @param \Illuminate\Database\Schema\Blueprint $blueprint
     * @param \Illuminate\Support\Fluent $command
     * @return string
     */
    public function compileComment(Blueprint $blueprint, Fluent $command): string
    {
        return sprintf('COMMENT ON TABLE %s IS %s',
            $this->wrapTable($blueprint),
            "'" . str_replace("'", "''", $command->comment) . "'"
        );
    }

    /**
     * Compile a removing table comment command.
     *
     * @param \Illuminate\Database\Schema\Blueprint $blueprint
     * @param \Illuminate\Support\Fluent $command
     * @return string
     */
    public function compileRemoveComment(Blueprint $blueprint, Fluent $command): string
    {
        return sprintf('COMMENT ON TABLE %s IS NULL',
            $this->wrapTable($blueprint)
        );
    }
}
