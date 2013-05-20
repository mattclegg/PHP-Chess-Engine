<?php

echo "Simple usage: <br /><br /><br />";

include 'autoload.php';

use ShinnyChess\Pieces\King;
use ShinnyChess\Board\Field;

class x
{
    public $k;
    
    public function __construct()
    {
        $this->k = new King(new Field(5,2));
        $this->k->moveTo(new Field(5,2));
        echo $this->k->getCurrentField()->getYAxisPosition();
    }
}
$x = new x();