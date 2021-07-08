<?php

/**
 *
 25 16 11  6 23
 10  5 24 17 12
 15 18  1 22  7
  4  9 20 13  2
 19 14  3  8 21
 */

require 'src/Board.php';
require 'src/Piece.php';
require 'src/Knight.php';

$board = new Board();

$knight = new Knight(2, 2);
$knight->putOn($board);

run($knight);

function run($knight)
{
    $knight->pickUp();
    $moves = $knight->getPossibleMoveList();

    if (empty($moves)) {
        if ($knight->getBoard()->fullyCrowded()) {
            $knight->getBoard()->output();
        }
        return;
    }
    
    foreach ($moves as $move) {
        echo '.';
        $dx = $move[0];
        $dy = $move[1];
        
        $clonedKnight = clone $knight;
        $clonedBoard = clone $knight->getBoard();
        $clonedKnight->setBoard($clonedBoard);
        
        $clonedKnight->move($dx, $dy);
        run($clonedKnight);
    }
}