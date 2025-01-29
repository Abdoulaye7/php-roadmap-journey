<?php

class Calculatrice{
    
    private int $a;
    private int $b;

    public function __construct(int $a, int $b){
        $this->a = $a;
        $this->b = $b;
    }

    public function addition():int{
        return $this->a + $this->b;
    }
    public function soustraction():int{
        return $this->a - $this->b;
    }
    public function multiplication():int{
        return $this->a * $this->b;
    }
    public function diviser():int{
       try{

          if($this->b === 0){
            throw new Exception('Division par zéro.');
          }else{
            return $this->a / $this->b;
          }

       }catch(Exception $e){
         echo  $e->getMessage();
         return 0;
       }
    }
   
}

$calc = new Calculatrice(10, 2);

echo "Addition: " . $calc->addition() . "<br>";         
echo "Soustraction: " . $calc->soustraction() . "<br>";  
echo "Multiplication: " . $calc->multiplication() . "<br>";  
echo "Division: " . $calc->diviser() . "<br>";  

$calcZero = new Calculatrice(10, 0);
echo "Division: " . $calcZero->diviser();  // Affiche "Division par zéro." et retourne 0
