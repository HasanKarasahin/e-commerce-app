<?php

abstract class Controller
{

    abstract function display();

    abstract function action($actionType, $id);

}