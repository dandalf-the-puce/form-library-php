<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\Field;

use Dandalf\FormLibrary\Exception\InvalidArgumentException;
use Dandalf\FormLibrary\Field\Choice\ChoiceOption;
use Dandalf\FormLibrary\FieldAttribute\Choice\ChoiceAttributeInterface;
use Dandalf\FormLibrary\FieldAttribute\Choice\ChoiceAttributeTrait;
use Symfony\Component\Intl\Currencies;
use Symfony\Component\Intl\Locales;

/**
 * A field for selecting currencies
 * 
 * If the `symfony/intl` library is installed, this field automatically populates the choices. Use `CurrencyField::setLocale()` before initiating the field to set the locale for currency names.
 */
class CurrencyField implements FieldInterface, ChoiceAttributeInterface
{
    use FieldTrait, ChoiceAttributeTrait {
        FieldTrait::__construct as defaultConstruct;
    }

    private static ?string $locale = null;

    protected string $type = 'currency';

    public function __construct(string $key)
    {
        $this->defaultConstruct($key);

        if (class_exists(Currencies::class)) {
            $this->setUpCurrencies();
        }
    }

    private function setUpCurrencies(): void
    {
        $currencies = self::$locale ? Currencies::getNames(self::$locale) : Currencies::getNames();

        foreach ($currencies as $code => $name) {
            $option = new ChoiceOption();

            $option
                ->setLabel("$name [$code]")
                ->setValue($code)
                //
            ;

            $this->addOption($option);
        }
    }

    /**
     * @throws InvalidArgumentException When `symfony/int` is installed and the locale code does not exist
     */
    public static function setLocale(?string $locale): void
    {
        if ($locale && class_exists(Locales::class) && !Locales::exists($locale)) {
            throw new InvalidArgumentException("Unknown locale code: $locale");
        }

        self:$locale = $locale;
    }
}
