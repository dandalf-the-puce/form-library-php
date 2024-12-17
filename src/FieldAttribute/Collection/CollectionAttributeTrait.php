<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FieldAttribute\Collection;

use Dandalf\FormLibrary\Exception\InvalidArgumentException;
use Dandalf\FormLibrary\Field\FieldInterface;
use Dandalf\FormLibrary\FieldAttribute\BaseFieldAttributeTrait;

/**
 * Built-in trait which follows the `CollectionAttributeInterface`
 */
trait CollectionAttributeTrait
{
    use BaseFieldAttributeTrait;

    private array $fields = [
        // 'key' => FieldInterface,
    ];

    /**
     * @throws InvalidArgumentException Field already exists
     */
    public function addField(FieldInterface $field): self
    {
        $key = $field->getKey();

        if (array_key_exists($key, $this->fields)) {
            throw new InvalidArgumentException("Field $key already exists");
        }

        $this->fields[$key] = $field;

        return $this;
    }

    /**
     * @throws InvalidArgumentException Field does not exist
     */
    public function removeField(FieldInterface $field): self
    {
        $key = $field->getKey();

        if (!array_key_exists($key, $this->fields)) {
            throw new InvalidArgumentException("Field $key does not exist");
        }

        unset($this->fields[$key]);

        return $this;
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    protected function toArray(): array
    {
        $response = $this->baseAttributesToArray();

        $response['fields'] = (object) [];

        foreach ($this->fields as $key => $field) {
            $response['fields']->{$key} = $field->toArray();
        }

        return $response;
    }
}
