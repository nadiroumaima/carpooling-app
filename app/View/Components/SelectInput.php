<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class SelectInputComponent extends Component
{
    public $id;
    public $name;
    public $class;
    public $value;
    public $options;

    public function __construct($id, $name, $class = '', $value = null, $options = [])
    {
        $this->id = $id;
        $this->name = $name;
        $this->class = $class;
        $this->value = $value;
        $this->options = $options;
    }

    public function render()
    {
        return view('components.form.select-input');
    }
}
