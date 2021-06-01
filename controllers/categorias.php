<?php
    class categariasconst{
        public function categarias()
        {
            require('models/categarias.php');
            $categorías = new categorias();
            return $categorías->seleccategorias();
        }
   }
?>