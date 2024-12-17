<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FieldAttribute\File;

use Dandalf\FormLibrary\FieldAttribute\FieldAttributeInterface;

/**
 * Interface for fields that accept one or more files
 */
interface FileAttributeInterface extends FieldAttributeInterface
{
    public function getMultiple(): bool;

    public function setMultiple(bool $multiple): self;

    public function getAccept(): array|null|string;

    public function setAccept(array|null|string $accept): self;
    
    public function getMaxSize(): int|null|string;

    public function setMaxSize(int|null|string $max_size): self;
}
