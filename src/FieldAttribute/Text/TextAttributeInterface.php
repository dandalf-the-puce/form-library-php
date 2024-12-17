<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FieldAttribute\Text;

use Dandalf\FormLibrary\FieldAttribute\FieldAttributeInterface;

/**
 * Interface for fields that accept text values
 */
interface TextAttributeInterface extends FieldAttributeInterface
{
    public function getMaxLength(): ?int;

    public function setMaxLength(?int $max_length): self;

    public function getMinLength(): ?int;

    public function setMinLength(?int $min_length): self;

    public function getPattern(): ?string;

    public function setPattern(?string $pattern): self;
}
