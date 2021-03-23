<?php

namespace Controller;


abstract class Controller
{

    abstract function display();

    abstract function action($actionType, $id);

}