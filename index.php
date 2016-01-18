<?php

class card{

    private $face,$color;

    public function __construct($color,$face){

        $this->face = $face;
        $this->color = $color;

    }

    public function getFace(){

        return $this->face;

    }

    public function getColor(){

        return $this->color;

    }

    public function getValue(){

        if(is_int($this->face)){

            return $this->face;

        }
        else{

            return 10;

        }

    }

    public function  __toString(){

        return $this->face." de ".$this->color;

    }

}

class Deck{

    private $cards;
    public function __construct(){

        $this->cards = [];
        $faces = range(1,10);
        $faces = array_merge($faces,["Jack","Queen","king"]);
        $colors = ["HEART","CLUB","DIAMOND","SPADE"];

        foreach($colors as $color){

            foreach($faces as $face){

                $this->cards[] = new Card($color,$face);

            }
        }
    }

    public function shuffle(){

        shuffle($this->cards);
        return $this;

    }

    public function deal($n = 1){

        $cards = array_splice($this->cards, 0, $n);
        return $cards;

    }

}

$d = new Deck();
list($carte) = $d->shuffle()->deal(1);

?>


<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <title>BlackJack ? - Jeu</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<div id="header">

    BlackJack

</div>

<div id="content">

<?php echo $carte; ?>

</div>


</body>
</html>