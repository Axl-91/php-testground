<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\RouteNotFoundException;
use App\Exceptions\ViewNotFound;

class View {
    public function __construct(
        protected string $view,
        protected array $params = []
    ){}

    public static function make(string $view, array $params = []){
        return new static($view, $params);
    }

    public function render(): string{
        $viewFile = VIEWS_PATH . $this->view . '.php';

        if (!file_exists($viewFile)) {
            throw new RouteNotFoundException();
        }

        ob_start();
        require $viewFile;
        return (string) ob_get_clean();
    }

    public function __toString(){
        return $this->render();
    }
}