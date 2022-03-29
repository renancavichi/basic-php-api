<?php class Product{
    public $id;
    public $name;
    public $value;
    public $lenght;
    function __construct($id, $name, $value, $lenght) {
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
        $this->lenght = $lenght;
    }
    function create(){
        echo "Cadastrar no banco: ".$this->name;
    }
    function delete(){
        echo "Delete no banco".$this->id;
    }
}
?>