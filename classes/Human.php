<?php

class Human extends Lives
{
    //プロパティの追加
    const MAX_HITPOINT = 100;

    public function __construct($name, $hitPoint = 100, $attackPoint = 20, $intelligence = 0)
    {
        parent::__construct($name,$hitPoint,$attackPoint,$intelligence);
    }
    
}
