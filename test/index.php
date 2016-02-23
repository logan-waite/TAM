<?php
    class myFirstClass
    {
        // property declaration
        public $var = 'first';

        // method declaration
        public function displayVar() {
            echo $this->var;
        }
    }

    class mySecondClass
    {
        // property declaration
        public $var = 'second';

        // method declaration
        public function displayVar() {
            echo $this->var;
        }
    }

    $class = "This";

    $what = new $class;

    var_dump($what);
?>
