<?php


namespace Alvarofpp\ExpandDatabase\Traits;

use Alvarofpp\ExpandDatabase\Database\Schema\Blueprint;

trait CustomBlueprint
{
    /**
     * Get a schema builder instance for the connection.
     *
     * @return \Illuminate\Database\Schema\Builder
     */
    public function getSchemaBuilder()
    {
        $builder = parent::getSchemaBuilder();
        $builder->blueprintResolver(function ($table, $callback) {
            return new Blueprint($table, $callback);
        });

        return $builder;
    }
}
