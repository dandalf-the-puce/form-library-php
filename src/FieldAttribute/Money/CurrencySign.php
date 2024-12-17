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
 * Class for describing if money values should use minus signs or parentheses for negative values
 * 
 * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Intl/NumberFormat/NumberFormat#currencysign
 */
class CurrencySign implements JsonSerializable
{
    public const DEFAULT_VALUE = 'standard';

    public const VALID_VALUES = [
        'standard',
        'accounting',
    ];

    private string $value = self::DEFAULT_VALUE;

    /**
     * @throws InvalidArgumentException Submitted value does not match valid values
     */
    public function __construct(string $value = self::DEFAULT_VALUE)
    {
        if (!self::isValid($value)) {
            throw new InvalidArgumentException("Unknown currency sign value: $value");
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
