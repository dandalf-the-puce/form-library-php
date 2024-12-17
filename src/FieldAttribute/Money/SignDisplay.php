<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\FieldAttribute\Money;

use Dandalf\FormLibrary\Exception\InvalidArgumentException;
use JsonSerializable;

/**
 * Class for describing when to display the sign for money values
 * 
 * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Intl/NumberFormat/NumberFormat#signdisplay
 */
class SignDisplay implements JsonSerializable
{
    public const DEFAULT_VALUE = 'auto';

    public const VALID_VALUES = [
        'always',
        'auto',
        'except_zero',
        'negative',
        'never',
    ];

    private string $value = self::DEFAULT_VALUE;

    /**
     * @throws InvalidArgumentException Submitted value does not match valid values
     */
    public function __construct(string $value = self::DEFAULT_VALUE)
    {
        if (!self::isValid($value)) {
            throw new InvalidArgumentException("Unknown sign display value: $value");
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public static function isValid(string $value): bool
    {
        return in_array($value, self::VALID_VALUES);
    }

    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
