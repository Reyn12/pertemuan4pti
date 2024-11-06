<?php

namespace App\Libraries;

class template
{
    protected $templateData = [];

    public function set($name, $value)
    {
        $this->templateData[$name] = $value;
    }

    public function load($template = '', $view = '', $viewData = [], $return = false)
    {
        // Set the content of the main view
        $this->set('contents', view($view, $viewData));

        // Render the main template, passing in the template data
        return view($template, $this->templateData);
    }
}
