<?php

namespace Khill\Lavacharts\Values;

use \Khill\Lavacharts\Exceptions\InvalidLabel;

/**
 * Label Value Object
 *
 *
 * Creates a new label for a chart or dashboard while checking if it is a non empty string.
 *
 * @category  Class
 * @package   Khill\Lavacharts
 * @author    Kevin Hill <kevinkhill@gmail.com>
 * @copyright (c) 2015, KHill Designs
 * @link      http://github.com/kevinkhill/lavacharts GitHub Repository Page
 * @link      http://lavacharts.com                   Official Docs Site
 * @license   http://opensource.org/licenses/MIT MIT
 */
class Label extends StringValue
{
    public function __construct($value)
    {
        try {
            parent::__construct($value);
        } catch (\Exception $e) {
            throw new InvalidLabel($value);
        }
    }
}
