<?php

require_once('./classes/Human.php');
require_once('./classes/Enemy.php');

//インスタンス化
$tiida = new Human();
$goblin = new Enemy();

$tiida->name = "ティーダ";
$goblin->name = "ゴブリン";

echo $tiida->name . "\n";
echo $goblin->name . "\n";

//現在のHPを表示
echo $tiida->name . ":" . $tiida->hitPoint . "/" . $tiida::MAX_HITPOINT. "\n";
echo $goblin->name . ":" . $goblin->hitPoint . "/" . $goblin::MAX_HITPOINT. "\n";

//攻撃
$tiida->doAttack($goblin);
echo "\n";
$goblin->doAttack($tiida);
echo "\n";
