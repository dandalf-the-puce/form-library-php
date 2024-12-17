<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FormError;

use JsonSerializable;

/**
 * A collection of errors for a single field in a form
 * 
 * This is essentially an array with special features.
 */
class FieldErrorCollection implements JsonSerializable
{
    /**
     * @var array[string]
     */
    private array $errors = [];

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function addError(string $error): self
    {
        $error = trim($error);

        // avoid empty errors
        if (!$error) {
            return $this;
        }

        // avoid duplicating errors
        if (!in_array($error, $this->errors)) {
            $this->errors[] = $error;
        }

        return $this;
    }

    public function count(): int
    {
        return count($this->errors);
    }

    public function jsonSerialize(): array
    {
        return $this->errors;
    }
}
