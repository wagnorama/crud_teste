<?php

class indexController
{

    public function handleRequest() {
        $this->showIndex();
    }

    public function showIndex() {

        include '/../view/index.php';

    }

}