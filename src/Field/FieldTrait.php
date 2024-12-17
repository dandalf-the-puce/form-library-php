<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\Field;

/**
 * Built-in trait which follows the `FieldInterface`
 */
trait FieldTrait
{
    private string $key;

    /**
     * Some fields using this trait may alias the `__construct` method to "pre-populate" certain attributes
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    protected function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getType(): string
    {
        return $this->type ?? 'text';
    }

    public function jsonSerialize(): object
    {
        // most built-in traits use a protected `toArray` method to collect formatted key-values
        $response = is_callable([$this, 'toArray']) ? call_user_func_array([$this, 'toArray'], []) : [];
        
        if (!$response) {
            // in the rare case a built-in trait does not have use the `toArray` method, call the method for the `BaseFieldAttributeTrait`, if present
            $response = is_callable([$this, 'baseAttributesToArray']) ? call_user_func_array([$this, 'baseAttributesToArray'], []) : [];
        }

        $response['type'] = $this->getType();

        return (object) $response;
    }
}
