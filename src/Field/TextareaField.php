<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\Field;

use Dandalf\FormLibrary\FieldAttribute\Text\TextAttributeInterface;
use Dandalf\FormLibrary\FieldAttribute\Text\TextAttributeTrait;

/**
 * A version of a text field for larger text input
 */
class TextareaField implements FieldInterface, TextAttributeInterface
{
    use FieldTrait, TextAttributeTrait;

    protected string $type = 'textarea';
}
