<?php


namespace Alvarofpp\ExpandDatabase\Database\Schema;

use Illuminate\Database\Schema\Blueprint as BaseBlueprint;

class Blueprint extends BaseBlueprint
{
    /**
     * Adds the command for the comment method.
     *
     * @param string $comment
     * @return $this
     */
    public function comment(string $comment): self
    {
        $this->addCommand('comment', compact('comment'));

        return $this;
    }
}
