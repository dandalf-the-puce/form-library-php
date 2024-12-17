<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\Field;

use Dandalf\FormLibrary\FieldAttribute\BaseFieldAttributeInterface;
use JsonSerializable;

/**
 * Interface for fields
 */
interface FieldInterface extends BaseFieldAttributeInterface, JsonSerializable
{
    public function __construct(string $key);

    public function getKey(): string;

    public function getType(): string;
}
