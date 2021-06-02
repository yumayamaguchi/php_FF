<?php

require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');
require_once('./classes/BlackMage.php');
require_once('./classes/WhiteMage.php');

//インスタンス化
$members = array();
$members[] = new Brave('ティーダ');
$members[] = new BlackMage('ルール');
$members[] = new WhiteMage('ユウナ');
//$tiida = new Brave("ティーダ");
//$goblin = new Enemy("ゴブリン");

$enemies = array();
$enemies[] = new Enemy('ゴブリン', 20);
$enemies[] = new Enemy('ボム', 25);
$enemies[] = new Enemy('モルボル', 30);


$turn = 1;

$isFinishFlg = false;

while (!$isFinishFlg) {
    echo "*** $turn ターン目 ***\n\n";

    //仲間のHPの表示
    foreach ($members as $member) {
        echo $member->getName() . ":" . $member->getHitPoint() . "/" . $member::MAX_HITPOINT;
    }
    echo "\n";

    //敵のHPの表示
    foreach ($enemies as $enemy) {
        echo $enemy->getName() . ":" . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT;
    }
    echo "\n";

    //攻撃の表示
    foreach ($members as $member) {
        if (get_class($member) == "WhiteMage") {
            $member->doAttackWhiteMage($enemies, $members);
        } else {
            //白魔道士以外は通常攻撃
            $member->doAttack($enemies);
        }
        echo "\n";
    }
    echo "\n";

    //敵の攻撃表示
    foreach ($enemies as $enemy) {
        $enemy->doAttack($members);
        echo "\n";
    }

    echo "\n";


    //??
    $deathCnt = 0;
    foreach ($members as $member) {
        if ($member->getHitPoint() > 0) {
            $isFinishFlg = false;
            break;
        }
        $deathCnt++;
    }
    if ($deathCnt === count($members)) {
        $isFinishFlg = true;
        echo "GAME OVER....\n\n";
        break;
    }

    $deathCnt = 0;
    foreach($enemies as $enemy) {
        if($enemy->getHitPoint() > 0) {
            $isFinishFlg = false;
            break;
        }
        $deathCnt++;
    }
    if($deathCnt === count($enemies)) {
        $isFinishFlg = true;
        echo "♪♪♪ファンファーレ♪♪♪\n\n";
        break;
    }

    $turn++;
}

echo "*** 戦闘終了 ***\n\n";
foreach ($members as $member) {
    echo $member->getName(). ":" .$member->getHitPoint(). "/".$member::MAX_HITPOINT."\n";
}
echo "\n";
foreach ($enemies as $enemy) {
    echo $enemy->getName(). ":" . $enemy->getHitPoint(). "/". $enemy->getHitPoint() . "/" .$enemy::MAX_HITPOINT. "\n";
}
