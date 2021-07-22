<?php

namespace Trinityrank\DraftStatus;

use Laravel\Nova\Fields\Field;

class DraftStatus extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'draft-status';

    /**
     * Create a new field.
     *
     * @param string $name
     * @param string|null $attribute
     * @param mixed|null $resolveCallback
     * @return void
     */
    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute , $resolveCallback);

        $this->exceptOnForms();

    }
}
