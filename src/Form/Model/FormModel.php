<?php

namespace App\Form\Model;

use Base\Form\Common\AbstractModel;
use Base\Validator\Constraints as AssertBase;

/**
 * @AssertBase\NotBlank
 */
class FormModel extends AbstractModel
{
    public $element_1;
    public $element_2;
    public $element_3;
    public $element_4;
}
