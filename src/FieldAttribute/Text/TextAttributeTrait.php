<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FieldAttribute\Text;

use Dandalf\FormLibrary\Exception\InvalidArgumentException;
use Dandalf\FormLibrary\FieldAttribute\BaseFieldAttributeTrait;

/**
 * Built-in trait which follows the `TextAttributeInterface`
 */
trait TextAttributeTrait
{
    use BaseFieldAttributeTrait;
    
    private ?int $max_length = null;

    private ?int $min_length = null;

    private ?string $pattern = null;

    public function getMaxLength(): ?int
    {
        return $this->max_length;
    }

    /**
     * @throws InvalidArgumentException Max length must be zero or greater
     */
    public function setMaxLength(?int $max_length): self
    {
        if ($max_length !== null && $max_length < 0) {
            throw new InvalidArgumentException("Max length must be zero or greater. Value submitted: $max_length");
        }

        $this->max_length = $max_length;

        return $this;
    }

    public function getMinLength(): ?int
    {
        return $this->min_length;
    }

    /**
     * @throws InvalidArgumentException Min length must be zero or greater
     */
    public function setMinLength(?int $min_length): self
    {
        if ($min_length !== null && $min_length < 0) {
            throw new InvalidArgumentException("Min length must be zero or greater. Value submitted: $min_length");
        }

        $this->min_length = $min_length;

        return $this;
    }

    public function getPattern(): ?string
    {
        return $this->pattern;
    }

    public function setPattern(?string $pattern): self
    {
        $this->pattern = $pattern;

        return $this;
    }

    protected function toArray(): array
    {
        $response = $this->baseAttributesToArray();

        if ($this->max_length !== null) {
            $response['max_length'] = $this->max_length;
        }

        if ($this->min_length !== null) {
            $response['min_length'] = $this->min_length;
        }

        if ($this->pattern !== null) {
            $response['pattern'] = $this->pattern;
        }

        return $response;
    }
}
