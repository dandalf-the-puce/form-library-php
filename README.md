# Form library (PHP)

A PHP library for creating objects compatible with my [form specification](https://github.com/dandalf-the-puce/form-spec).

# General structure

The `FormStructure` class consists of:

* A collection of `FieldInterface` objects
* An optional `auto_focus` value which indicate which field should be automatically focused

Each `FieldInterface` contains the `BaseFieldAttributeInterface` as well as any additional attribute interfaces necessary for the type of field.

# Custom fields and attributes

While the library comes with various "built-in" fields, you can create your own. Custom fields must use the `FieldInterface`, which extends the `BaseFieldAttributeInterface`.

The library also comes with re-useable field attribute interfaces and traits, such as the `NumberAttributeTrait`. You can create custom field attributes, either following the existing attribute interfaces or implementing your own methods.

# Attributes and JsonSerializable

The `BaseFieldAttributeTrait` contains a protected method, `baseAttributesToArray`, which is used by most of the other built-in traits in a protected `toArray` method. This method is called by the `FieldTrait` when creating a JSON representation of a field.

Your custom classes do not need to strictly follow this structure. You are free to implement a completely different structure, provided it follows the form specification.

# Pre-populating custom fields

You may want to implement a field which pre-populates certain attribute properties. An example of how to do this can be found in the built-in `BooleanField`.

Set up an alias for the `__construct` method:

```php
use FieldTrait, ChoiceAttributeTrait {
    FieldTrait::__construct as defaultConstruct;
}
```

Then, set up your custom constructor, remembering to call the aliased constructor method:

```php
public function __construct(string $key)
{
    $this->defaultConstruct($key);

    $this
        ->addOption($this->createOption(true, 'Yes'))
        ->addOption($this->createOption(false, 'No'))
        //
    ;
}
```

## Currencies and locales

The library will make use of the `symfony/intl` package (if installed) to pre-populate the options for the `CurrencyField` and validate values for methods in the `CurrencyField` and `MoneyAttributeTrait` classes.

It is not strictly necessary to install the package to make use of these fields.

# Error responses

The `FormErrors` class is used to create a standard error response to invalid forms:

```json
{
    "message": "There are form errors",
    "form": {
        "name": [
            "This field is required"
        ]
    }
}
```

The `form` property is optional if there are no issues with the form itself:

```json

{
    "message": "You do not have permission to submit this form"
}
```

# Exceptions

The library contains one custom exception, `InvalidArgumentException`, which is called when one of the arguments submitted to a class method is invalid for some reason. For example, submitting a negative number for a method which only accepts positive numbers.

This custom exception allows you to handle library exceptions separately if needed.

# Version notes

## 1.0.0

* Initial library publication

# Future plans

I have the same plans for this library as I do for my [form specification](https://github.com/dandalf-the-puce/form-spec?tab=readme-ov-file#future-plans).

If I learn about a smarter way to structure this class, I'll update the library. Much of this work is a learning experiment and I'd like to improve on my work as I learn more.
