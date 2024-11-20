<?php

namespace MVC\src;

class Controller {
    protected function render($view, $data = []) {
        extract($data);

        include "view/$view.php";
    }
}