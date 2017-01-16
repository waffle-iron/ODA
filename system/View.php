<?php
namespace System;

class Template
{
    private $vars = array();
    public function __get($name)
    {
        return $this->vars[$name];
    }

    public function __set($name, $value)
    {
        if ($name == 'view_template_file') {
            throw new Exception("No puede haber una variable llamada 'view_template_file'");
        }
        $this->vars[$name] = $value;
    }

    public function render($view_template_file)
    {
        if (array_key_exists('view_template_file', $this->vars)) {
            throw new Exception("No puede haber una variable llamada 'view_template_file'");
        } 
        extract($this->vars);
        ob_start();
        include($view_template_file);
        return ob_get_clean();
    }
}

