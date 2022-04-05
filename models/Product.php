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
        $input = file_get_contents('php://input');
        echo $input.lenght();
        $input = json_decode($input, true);
        print_r($input);
        echo 'teste';
    }
    function delete(){
        echo "Delete no banco".$this->id;
    }
}
?>