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

    public function getFirstIndex($array, $element)
    {
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i] == $element)
            {
                return $i;
            }
        }
        return 0;
    }

    public function findPattern($array) {
        $lastthree = array_slice($array, -1, 3);
        $score = 0;

        
            
    }

    public function rockFirst() {

    }


    public function getChoice()
    {

        $plays = ["rock", "scissors", "paper"];
        $counters = ["paper", "rock", "scissors"];
        $counterfunction = [parent::paperChoice(), parent::rockChoice(), parent::scissorsChoice()];
        $doublecounter = [parent::scissorsChoice(), parent::paperChoice(), parent::rockChoice()];
        $triplecounter = [parent::rockChoice(), parent::scissorsChoice(), parent::paperChoice()];

        $lastchoiceopo = $this->result->getLastChoiceFor($this->opponentSide);
        $mylastscore =  $this->result->getLastScoreFor($this->mySide);
        
        $myallchoices = $this->result->getChoicesFor($this->mySide);
        $opoallchoices = $this->result->getChoicesFor($this->opponentSide);
        
        if ($mylastscore < 0) 
        {
            return $counterfunction[$this->getFirstIndex($plays, $lastchoiceopo)];
        }
        return $doublecounter[$this->getFirstIndex($plays, $lastchoiceopo)];

    }
};
