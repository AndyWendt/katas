<?php

namespace Katas\Sudoku;

class SudokuSolver
{
    // https://dingo.sbs.arizona.edu/~sandiway/sudoku/

    //Determine possible values
    //winnow the available choices for cell (1,1) down to just 1 through reasoning by contradiction

    // Heuristic 1a: Simple row, column or 3 x 3 area inconsistency. (Only red highlighting is used.)
    // Heuristic 1b: Row, column or 3 x 3 area insufficiency. (Blue and red highlighting is used.)
    // Heuristic 1+: Boosted version of the inconsistency/insufficiency checker factoring in the two uniqueness heuristics. (Multiple highlighting is used.)
    // Heuristic 2: Row, column or 3 x 3 area set cover elimination. (Green and red highlighting is used.)
    // Heuristic 3: Unique row/column combination. (Gold highlighting is used.)
    // Heuristic 4: Unique mention in row, column or 3 x 3 area. (Brown and red highlighting is used.)

    public function solve($argument1)
    {
        // TODO: write logic here
    }
}
