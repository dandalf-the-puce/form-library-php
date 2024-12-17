<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FormStructure;

use Dandalf\FormLibrary\Exception\InvalidArgumentException;
use Dandalf\FormLibrary\Field\FieldInterface;

/**
 * A built-in class to define the structure of a form
 * 
 * Class methods may throw `InvalidArgumentException` when attempting to overwrite fields or assign auto focus to non-existent fields.
 */
class FormStructure implements FormStructureInterface
{
    private bool $prune_disabled = false;

    private ?string $auto_focus = null;

    private array $fields = [
        // 'key' => FieldInterface,
    ];

    public function getAutoFocusKey(): ?string
    {
        return $this->auto_focus;
    }

    /**
     * @throws InvalidArgumentException String key value does not correspond to any field key
     */
    public function setAutoFocusKey(?string $key): self
    {
        if ($key !== null && !array_key_exists($key, $this->fields)) {
            throw new InvalidArgumentException("Auto focus key must be a valid field. Value submitted: $key");
        }

        $this->auto_focus = $key;

        return $this;
    }

    /**
     * @throws InvalidArgumentException A field with the same key has already been added to the structure
     */
    public function addField(FieldInterface $field, bool $auto_focus = false): self
    {
        $key = $field->getKey();

        if (array_key_exists($key, $this->fields)) {
            throw new InvalidArgumentException("Field `$key` is already present");
        }

        // skip disabled fields if we're pruning them out
        if ($this->prune_disabled && $field->getDisabled()) {
            return $this;
        }

        $this->fields[$key] = $field;

        if ($auto_focus) {
            $this->setAutoFocusKey($key);
        }

        return $this;
    }

    public function getFields(): array
    {
        return array_values($this->fields);
    }

    /**
     * @throws InvalidArgumentException No corresponding field exists in the structure
     */
    public function removeField(FieldInterface $field): self
    {
        $key = $field->getKey();

        if (!array_key_exists($key, $this->fields)) {
            throw new InvalidArgumentException("Field `$key` was not found");
        }

        unset($this->fields[$key]);

        if ($this->auto_focus === $key) {
            $this->auto_focus = null;
        }

        return $this;
    }

    public function getPruneDisabled(): bool
    {
        return $this->prune_disabled;
    }

    public function setPruneDisabled(bool $prune_disabled): self
    {
        $this->prune_disabled = $prune_disabled;

        // take steps to remove any existing disabled fields
        if ($this->prune_disabled) {
            foreach ($this->fields as $key => $field) {
                if ($field->getDisabled()) {
                    unset($this->fields[$key]);
                }
            }
        }

        return $this;
    }

    public function jsonSerialize(): array
    {
        $response = [];

        if ($this->auto_focus) {
            $response['auto_focus'] = $this->auto_focus;
        }

        $response['fields'] = (object) $this->fields;

        return $response;
    }
}
