<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FormError;

use Dandalf\FormLibrary\Field\FieldInterface;
use JsonSerializable;

/**
 * Interface for reporting the errors with a submitted form
 */
interface FormErrorsInterface extends JsonSerializable
{
    public function __construct(string $message);

    public function getMessage(): string;

    public function setMessage(string $message): self;

    public function getErrors(): array;

    public function addErrorForField(FieldInterface $field, string $error): self;

    public function addErrorForKey(string $key, string $error): self;

    public function removeErrorForField(FieldInterface $field): self;

    public function removeErrorForKey(string $key): self;
}
