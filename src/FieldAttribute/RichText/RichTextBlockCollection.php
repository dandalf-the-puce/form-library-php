<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FieldAttribute\RichText;

use JsonSerializable;

/**
 * A collection of rich text blocks
 * 
 * This is essentially an array with extra features.
 */
class RichTextBlockCollection implements JsonSerializable
{
    private array $blocks = [];

    public function getBlocks(): array
    {
        return $this->blocks;
    }

    public function addBlock(string $block): self
    {
        $block = trim($block);

        // ignore empty blocks
        if (!$block) {
            return $this;
        }

        // avoid duplicating blocks
        if (!in_array($block, $this->blocks)) {
            $this->blocks[] = $block;
        }

        return $this;
    }

    public function count(): int
    {
        return count($this->blocks);
    }

    public function jsonSerialize(): array
    {
        return $this->blocks;
    }
}
