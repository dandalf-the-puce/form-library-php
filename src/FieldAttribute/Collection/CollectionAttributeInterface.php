<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FieldAttribute\Collection;

use Dandalf\FormLibrary\Field\FieldInterface;
use Dandalf\FormLibrary\FieldAttribute\FieldAttributeInterface;

/**
 * Interface for nested fields
 */
interface CollectionAttributeInterface extends FieldAttributeInterface
{
    public function addField(FieldInterface $field): self;

    public function removeField(FieldInterface $field): self;

    public function getFields(): array;
}
