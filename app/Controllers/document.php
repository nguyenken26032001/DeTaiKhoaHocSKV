<?php
class document extends controller
{

    public $doc;
    function __construct()
    {
        $this->doc = $this->Model("taiLieu");
    }
    function  addDocument()
    {
        $this->doc->addDocument();
        $data = $this->doc->getListDocuments();
        $this->view("masters", [
            "page" => "admin/documentManager",
            "Action" => "3",
            "listDocuments" => $data,
        ]);
    }
    function documentManager()
    {
        $data = $this->doc->getListDocuments();
        $this->view("masters", [
            "page" => "admin/documentManager",
            "Action" => "3",
            "listDocuments" => $data,
        ]);
    }

    function documentDetail($id)
    {
        $data = $this->doc->getDocumentById($id);
        $this->view("masters", [
            "page" => "admin/documentDetail",
            "Action" => "3",
            "documentDetai" => $data,

        ]);
    }
    function updateDocument()
    {
        if (isset($_POST['updateDocument'])) {
            $id = $_POST['id'];
        }
        $value = $this->doc->update();
        if ($value == 1) {
            header("Location: ../document/documentManager");
        } else {
            $this->documentDetail($id);
        }
    }
}
