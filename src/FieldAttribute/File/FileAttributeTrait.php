<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FieldAttribute\File;

use Dandalf\FormLibrary\Exception\InvalidArgumentException;
use Dandalf\FormLibrary\FieldAttribute\BaseFieldAttributeTrait;

/**
 * Built-in trait which follows the `FileAttributeInterface`
 */
trait FileAttributeTrait
{
    use BaseFieldAttributeTrait;

    private bool $multiple = false;

    private array|null|string $accept = null;

    private int|null|string $max_size = null;

    public function getMultiple(): bool
    {
        return $this->multiple;
    }

    public function setMultiple(bool $multiple): self
    {
        $this->multiple = $multiple;

        return $this;
    }

    public function getAccept(): array|null|string
    {
        return $this->accept;
    }

    public function setAccept(array|null|string $accept): self
    {
        $this->accept = $accept;

        return $this;
    }

    public function getMaxSize(): int|null|string
    {
        return $this->max_size;
    }

    /**
     * @throws InvalidArgumentException Integer argument must be greater than zero
     */
    public function setMaxSize(int|null|string $max_size): self
    {
        if (gettype($max_size) === 'integer' && $max_size <= 0) {
            throw new InvalidArgumentException("Max size must be an integer greater than zero. Value submitted: $max_size");
        }

        $this->max_size = $max_size;

        return $this;
    }

    protected function toArray(): array
    {
        $response = $this->baseAttributesToArray();

        if ($this->accept) {
            $response['accept'] = gettype($this->accept) === 'string' ? $this->accept : implode(',', $this->accept);
        }

        if ($this->max_size) {
            $response['max_size'] = $this->max_size;
        }

        if ($this->multiple) {
            $response['multiple'] = $this->multiple;
        }

        return $response;
    }
}
