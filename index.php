
<?php
   // quando tem uma classe abstrata que faz uma injeção de independencia nela
// podem ser varios tipos de objetos diferentes 

interface  APIDesenho{

    public function desenharCirculo($x, $y, $radios);

}

class APIDesenho1 implements APIDesenho{
    public function desenharCirculo($x, $y, $radios) {
        echo "Desenhando Círculo, v1: ".$x." - ".$y." - ".$radios;
    }
}

class APIDesenho2 implements APIDesenho{
    public function desenharCirculo($x, $y, $radios) {
        echo "Desenhando Círculo, v2: ".$x." - ".$y." - ".$radios;
    }
}

abstract  class Forma{
    protected $api;
    protected $x;
    protected $y;
    
    public function __construct(APIDesenho $api) {
        $this->api = $api;
    }
}

class Circulo extends Forma{
    protected $radio;
    
    public function __construct($x, $y, $radios, APIDesenho $api){
    
        parent::__construct($api);
        $this->x = $x;
        $this->x = $y;
        $this->radio = $radios;
    }
    
    public function desenhar(){
        $this->api->desenharCirculo($this->x, $this->y, $this->radio);
    }
     
}
    $circulo = new Circulo(1, 3, 7, new APIDesenho1());
    $circulo->desenhar();
?>
