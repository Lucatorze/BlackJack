<?php

class Card{

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
        }else{
            return 10;
        }
    }

    public function __toString(){
        return $this->face." de ".$this->color;
    }
}

//$asDeCoeur = new Card("HEART", 1);
//echo $asDeCoeur;

class Deck{
    private $cards;
    public function __construct(){
        $this->cards = [];
        $faces = range(1,10);
        $faces = array_merge($faces,["Jack","Queen","King"]);
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

class Player{
    protected $hand; //sert à stocker les cartes ue le joueur possède
    protected $pseudo;

    public function __construct($toto){
        $this->hand = [];
        $this->pseudo = $toto;
    }

    public function take($cards){
        //TODO : récupère les cartes passées en paramètre
        //et les place dans $this->hand
    }

    public function getHandValue(){
        //TODO : compter et returner la somme des valeurs de la main de la personne
        return 22;
    }

}

class Bank extends Player{
    public function __construct(){
        parent::__construct("Banque");
    }
}

//SCENARIO 1

$deck = new Deck();
$deck->shuffle();
$bank = new Bank();

$bank->take($deck->deal(2)); //tire 2 cartes du deck, la banque les prends

while( $bank->getHandValue() < 17){
    $bank->take($deck->deal(1));
}

if($bank->getHandValue() > 21){
    echo "La banque perd";
}else{
    echo "La banque a ".$bank->getHandValue();
}








