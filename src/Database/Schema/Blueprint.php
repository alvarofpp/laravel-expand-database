<?php


namespace Alvarofpp\ExpandDatabase\Database\Schema;

use Illuminate\Database\Schema\Blueprint as BaseBlueprint;

class Blueprint extends BaseBlueprint
{
    /**
     * Adds the command to the comment method.
     *
     * @param string $comment
     * @return $this
     */
    public function comment(string $comment = null): self
    {
        $this->addCommand('comment', compact('comment'));
        return $this;
    }

    /**
     * Adds the command to the method of removing the comment
     *
     * @return $this
     */
    public function removeComment(): self
    {
        $this->addCommand('removeComment');
        return $this;
    }
}
