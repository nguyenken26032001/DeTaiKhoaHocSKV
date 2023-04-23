<?php
class administrator extends DB{

    function getInfo() {
       return $this->executeResult("SELECT * FROM admin");
    }

}


