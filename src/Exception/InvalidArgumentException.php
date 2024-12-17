<?php

/**
 * This file is part of the `form-library-php` project.
 * 
 * (c) Dan Blair <1danblair@gmail.com>
 * 
 * For full copyright and license information, please view the `LICENSE.md` file that was distributed with this source code.
 */

namespace Dandalf\FormLibrary\Exception;

use Exception;

/**
 * Custom exception class for the library
 * 
 * This exception is called when method arguments fail a validation. This is the only exception called by the library, allowing you to handle it separately from other exceptions in your own project.
 */
class InvalidArgumentException extends Exception {}
