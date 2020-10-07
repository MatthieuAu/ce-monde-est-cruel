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

    public function getCounter($play) {

        $plays = ["rock", "scissors", "paper"];
        $counters = ["paper", "rock", "scissors"];
        return $counters[$this->getFirstIndex($plays, $play)];

    }

    public function iscountering() {
        $myallchoices = $this->result->getChoicesFor($this->mySide);
        $opoallchoices = $this->result->getChoicesFor($this->opponentSide);

        if (count($myallchoices) <= 3) 
        {
            return false;
        }

        $myplay = array_slice($myallchoices, -2)[0];
        $opolay = array_slice($opoallchoices, -1)[0];

        $score = 0;
        if ($this->getCounter($myplay) == $opolay){
            return true;
        }
        return false;
    }

    public function getChoice()
    {

        $plays = ["rock", "scissors", "paper"];
        $counters = ["paper", "rock", "scissors"];
        $counterfunction = [parent::paperChoice(), parent::rockChoice(), parent::scissorsChoice()];
        $doublecounter = [parent::scissorsChoice(), parent::paperChoice(), parent::rockChoice()];
        $triplecounter = [parent::rockChoice(), parent::scissorsChoice(), parent::paperChoice()];

        $lastchoiceopo = $this->result->getLastChoiceFor($this->opponentSide);
        $mylastchoice = $this->result->getLastChoiceFor($this->mySide);
        $mylastscore =  $this->result->getLastScoreFor($this->mySide);
        
        $myallchoices = $this->result->getChoicesFor($this->mySide);
        $opoallchoices = $this->result->getChoicesFor($this->opponentSide);
        

        if ($this->iscountering() === true) {
            return $doublecounter[$this->getFirstIndex($plays, $mylastchoice)];
        }
        return $counterfunction[$this->getFirstIndex($plays, $lastchoiceopo)];

    }
};
