<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\Field;

use Dandalf\FormLibrary\FieldAttribute\File\FileAttributeInterface;
use Dandalf\FormLibrary\FieldAttribute\File\FileAttributeTrait;

/**
 * Field for selecting files
 */
class FileField implements FieldInterface, FileAttributeInterface
{
    use FieldTrait, FileAttributeTrait;

    protected string $type = 'file';
}
