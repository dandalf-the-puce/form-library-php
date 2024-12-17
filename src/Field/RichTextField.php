<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\Field;

use Dandalf\FormLibrary\FieldAttribute\RichText\RichTextAttributeInterface;
use Dandalf\FormLibrary\FieldAttribute\RichText\RichTextAttributeTrait;

/**
 * A field for accepting rich text
 */
class RichTextField implements FieldInterface, RichTextAttributeInterface
{
    use FieldTrait, RichTextAttributeTrait;

    protected string $type = 'rich-text';
}
