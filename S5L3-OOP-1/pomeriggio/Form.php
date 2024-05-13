<?php
// creare la classe Form con la proprietà che contiene l'HTML del form
// i metodi per aggiungere labels ed inputs
// un metodo per renderizzare il form
// e un costruttore per passare gli attributi del form

class Form
{
    private $method;
    private $action;
    private $formBody = '';

    public function __construct($method, $action)
    {
        $this->method = $method;
        $this->action = $action;
    }

    public function addLabel($text, $id)
    {
        $this->formBody .= "<label for=\"$id\">$text</label>";
    }

    public function addInput($type, $name, $id, $value = '')
    {
        $this->formBody .= "<input type=\"$type\" id=\"$id\" name=\"$name\" value=\"$value\">";
    }

    public function addSumbit($text)
    {
        $this->formBody .= "<button>$text</button>";
    }

    public function render()
    {
        return "
            <form action=\"$this->action\" method=\"$this->method\">
                $this->formBody
            </form>
        ";
    }
}
