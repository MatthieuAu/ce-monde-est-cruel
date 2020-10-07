<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class RodiaPlayers
 * @package Hackathon\PlayerIA
 * @author Matthieu Aubry
 */
class RodiaPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        $lastopo = $this->result->getLastChoiceFor($this->opponentSide);
   
        if ($lastopo == "rock")
        {
            return parent::paperChoice();
        }
        return parent::rockChoice();

    }
};
