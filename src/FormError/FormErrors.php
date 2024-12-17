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

/**
 * Default class for reporting errors with submitted forms
 * 
 * No exceptions are thrown for this class. Adding errors will overwrite any existing keys and removing errors for non-existent keys will do nothing.
 */
class FormErrors implements FormErrorsInterface
{
    public const DEFAULT_MESSAGE = 'There are form errors';

    private string $message;

    private array $errors = [
        // 'key' => FieldErrorCollection,
    ];

    public function __construct(string $message = self::DEFAULT_MESSAGE)
    {
        $this->setMessage($message);
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function addErrorForField(FieldInterface $field, string $error): self
    {
        $key = $field->getKey();

        return $this->addErrorForKey($key, $error);
    }

    public function addErrorForKey(string $key, string $error): self
    {
        // skip empty errors
        if (!$error) {
            return $this;
        }

        if (!array_key_exists($key, $this->errors)) {
            $this->errors[$key] = new FieldErrorCollection();
        }

        /**
         * @var FieldErrorCollection
         */
        $collection = $this->errors[$key];

        $collection->addError($error);

        return $this;
    }

    public function removeErrorForField(FieldInterface $field): self
    {
        $key = $field->getKey();

        return $this->removeErrorForKey($key);
    }

    public function removeErrorForKey(string $key): self
    {
        if (array_key_exists($key, $this->errors)) {
            unset($this->errors[$key]);
        }

        return $this;
    }

    public function jsonSerialize(): array
    {
        $response = [
            'message' => $this->message,
        ];

        $errors = [];

        foreach ($this->errors as $key => $collection) {
            if ($collection->count()) {
                $errors[$key] = $collection;
            }
        }

        if ($errors) {
            $response['form'] = $errors;
        }

        return $response;
    }
}
