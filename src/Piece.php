<?php

abstract class Piece
{
    protected $x;
    protected $y;
    
    protected $board;
    
    function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
    
    public function getX()
    {
        return $this->x;
    }
    
    public function getY()
    {
        return $this->y;
    }
    
    public function getBoard()
    {
        return $this->board;
    }
    
    public function putOn($board)
    {
        $this->board = $board;
        $this->board->putPieceAt($this->x, $this->y);
    }
    
    public function setBoard($board)
    {
        $this->board = $board;
    }
    
    public function canMove($dx, $dy)
    {
        if ($dx < 0 && $this->x + $dx < 0) {
            return false;
        }
        
        if ($dx > 0 && $this->x + $dx > 4) {
            return false;
        }
        
        if ($dy < 0 && $this->y + $dy < 0) {
            return false;
        }
        
        if ($dy > 0 && $this->y + $dy > 4) {
            return false;
        }
        
        if ($this->board->busyAt($this->x + $dx, $this->y + $dy)) {
            return false;
        }
        
        return true;
    }
    
    public function move($dx, $dy)
    {
        if (!$this->canMove($dx, $dy)) {
            return;
        }
        
        $this->prevX = $this->x;
        $this->prevY = $this->y;
        
        $this->x += $dx;
        $this->y += $dy;
        
        $this->board->putPieceAt($this->x, $this->y);
    }
}