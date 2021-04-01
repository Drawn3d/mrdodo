<?php
class AddView
{
    public function __construct(AddController $controller) {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE."add.php";
    }

    public function render(){
        require($this->template);
    }
}