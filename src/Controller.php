<?php

namespace Tatib\Src;

class Controller {
    protected function render($view, $data = []) {
        extract($data);

        include "view/$view.php";
    }
}