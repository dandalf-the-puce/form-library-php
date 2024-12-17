<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\Field;

use Dandalf\FormLibrary\FieldAttribute\Collection\CollectionAttributeInterface;
use Dandalf\FormLibrary\FieldAttribute\Collection\CollectionAttributeTrait;

/**
 * A field for a nested fields in a form
 */
class CollectionField implements FieldInterface, CollectionAttributeInterface
{
    use FieldTrait, CollectionAttributeTrait;

    protected string $type = 'form';
}
