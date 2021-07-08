<?php

class Knight extends Piece
{
    private $possibleMoveList;

    public function pickUp()
    {
        $this->possibleMoveList = [];

        if ($this->canMove(-1, -2)) $this->possibleMoveList[] = [-1, -2];
        if ($this->canMove(-2, -1)) $this->possibleMoveList[] = [-2, -1];
        if ($this->canMove(1, -2)) $this->possibleMoveList[] = [1, -2];
        if ($this->canMove(2, -1)) $this->possibleMoveList[] = [2, -1];
        if ($this->canMove(-1, 2)) $this->possibleMoveList[] = [-1, 2];
        if ($this->canMove(-2, 1)) $this->possibleMoveList[] = [-2, 1];
        if ($this->canMove(1, 2)) $this->possibleMoveList[] = [1, 2];
        if ($this->canMove(2, 1)) $this->possibleMoveList[] = [2, 1];
    }
    
    public function getPossibleMoveList()
    {
        return $this->possibleMoveList;
    }
}