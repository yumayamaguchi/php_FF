<?php

class Enemy extends Lives
{
    const MAX_HITPOINT = 50;

    public function __construct($name, $attackPoint)
    {
        $this->name = $name;
        $this->attackPoint = $attackPoint;
        $hitPoint = 50;
        $intelligence = 0;
        parent::__construct($name,$hitPoint,$attackPoint,$intelligence);
    }

}
