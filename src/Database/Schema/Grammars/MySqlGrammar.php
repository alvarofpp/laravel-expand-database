<?php


namespace Alvarofpp\ExpandDatabase\Database\Schema\Grammars;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Grammars\MySqlGrammar as BaseMySqlGrammar;
use Illuminate\Support\Fluent;

class MySqlGrammar extends BaseMySqlGrammar
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
        return sprintf("alter table %s comment = '%s'",
            $this->wrapTable($blueprint),
            addslashes($command->comment)
        );
    }
}
