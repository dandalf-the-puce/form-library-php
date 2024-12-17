<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FieldAttribute\RichText;

use Dandalf\FormLibrary\FieldAttribute\FieldAttributeInterface;

/**
 * Interface for fields that accept rich text
 */
interface RichTextAttributeInterface extends FieldAttributeInterface
{
    public function getAllowedBlocks(): ?RichTextBlockCollection;

    public function setAllowedBlocks(?RichTextBlockCollection $allowed_blocks): self;

    public function getProhibitedBlocks(): ?RichTextBlockCollection;

    public function setProhibitedBlocks(?RichTextBlockCollection $prohibited_blocks): self;

    public function getBlockType(): string;

    public function setBlockType(string $block_type): self;
}
