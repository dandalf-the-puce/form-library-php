<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FieldAttribute\RichText;

use Dandalf\FormLibrary\FieldAttribute\BaseFieldAttributeTrait;

/**
 * Built-in trait which follows the `RichTextAttributeInterface`
 */
trait RichTextAttributeTrait
{
    use BaseFieldAttributeTrait;

    private ?RichTextBlockCollection $allowed_blocks = null;
    
    private ?RichTextBlockCollection $prohibited_blocks = null;

    private string $block_type = 'MD';

    public function getAllowedBlocks(): ?RichTextBlockCollection
    {
        return $this->allowed_blocks;
    }

    public function setAllowedBlocks(?RichTextBlockCollection $allowed_blocks): self
    {
        $this->allowed_blocks = $allowed_blocks;

        return $this;
    }

    public function getProhibitedBlocks(): ?RichTextBlockCollection
    {
        return $this->prohibited_blocks;
    }

    public function setProhibitedBlocks(?RichTextBlockCollection $prohibited_blocks): self
    {
        $this->prohibited_blocks = $prohibited_blocks;

        return $this;
    }

    public function getBlockType(): string
    {
        return $this->block_type;
    }

    public function setBlockType(string $block_type): self
    {
        $this->block_type = $block_type;

        return $this;
    }

    protected function toArray(): array
    {
        $response = $this->baseAttributesToArray();

        if ($this->allowed_blocks && $this->allowed_blocks->count()) {
            $response['allowed_blocks'] = $this->allowed_blocks;
        }

        if ($this->prohibited_blocks && $this->prohibited_blocks->count()) {
            $response['prohibited_blocks'] = $this->prohibited_blocks;
        }

        $response['block_type'] = $this->block_type;

        return $response;
    }
}
