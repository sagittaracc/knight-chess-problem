<?php

class Board
{
    private $cx = 1;

    private $board = [
        [0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0],
    ];
    
    public function getBoard()
    {
        return $this->board;
    }
    
    public function busyAt($x, $y)
    {
        return $this->board[$y][$x] !== 0;
    }
    
    public function putPieceAt($x, $y)
    {
        $this->board[$y][$x] = $this->cx++;
    }
    
    public function fakePieceAt($x, $y)
    {
        $this->putPieceAt($x, $y);
    }
    
    public function fullyCrowded()
    {
        foreach ($this->board as $row) {
            foreach ($row as $cell) {
                if ($cell === 0) {
                    return false;
                }
            }
        }
        
        return true;
    }
    
    public function output()
    {
        echo "\n";
        foreach ($this->board as $row) {
            echo implode(' ', $row);
            echo "\n";
        }
    }
}