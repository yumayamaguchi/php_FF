<?php

class Brave extends Human
{
    const MAX_HITPOINT = 120;
    private $hitPoint = self::MAX_HITPOINT;
    private $attackPoint = 30;

    public function __construct($name)
    {
        parent::__construct($name, $this->hitPoint, $this->attackPoint);
    }

    //オーバーライド
    public function doAttack($enemies)
    {
        if ($this->hitPoint <= 0) {
            return false;
        }

        $enemyIndex = rand(0, count($enemies) - 1);
        $enemy = $enemies[$enemyIndex];

        if (rand(1, 3) === 1) {
            //スキルの発動
            echo "『" . $this->getName() . "』のスキルが発動した！\n";
            echo "『ぜんりょくぎり』！！\n";
            echo $enemy->getName() . "に" . $this->attackPoint * 1.5 . "のダメージ！\n";
            $enemy->tookDamage($this->attackPoint * 1.5);
        } else {
            //親クラスのdoAttack(通常攻撃)を発動
            parent::doAttack($enemies);
        }
        return true;
    }

    public function getAttackPoint()
    {
        return $this->attackPoint;
    }
}
