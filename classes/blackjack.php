<?php
declare(strict_types=1);

class Blackjack
{

    const LOW_CARD = 1;
    const HIGH_CARD = 11;
    private $score = 0;

    public function __construct(int $score)
    {
        $this->score = $score;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function hit() {
        $card = rand(self::LOW_CARD, self::HIGH_CARD);
        $this->score += $card;
    }

    public function stand() {
        ;
    }

    public function surrender() {
        ;
    }
}