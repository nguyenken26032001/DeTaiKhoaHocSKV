<?php
class Admin extends controller
{
    public $DepartmentModel;
    public $Article;
    public $lop;
    function __construct()
    {
        $this->DepartmentModel = $this->Model("DepartmentModel");
        $this->Article = $this->Model("Article");
        $this->lop = $this->Model("Lop");
    }
    public function DefaultPage()
    {
        $data = $this->DepartmentModel->getList();
        $this->view("masters", [
            "dataDepartments" => $data,
            "page" => "admin/addArticle",
            "Action" => "1"
        ]);
    }
    public function managerArticle()
    {
        $data = $this->Article->getArticleList();
        $this->view("masters", [
            "page" => "admin/managerArticle",
            "Action" => "1",
            "dataArticle" => $data,
        ]);
    }
    public function notification()
    {
        $this->view("masters", [
            "page" => "admin/addNotification",
            "Action" => "2",
        ]);
    }
    public function notificationManager()
    {
        $data = $this->Model('Notification')->getList();
        $this->view("masters", [
            "page" => "admin/managerNotification",
            "Action" => "2",
            "dataNotification" => $data,
        ]);
    }
    public function DelNotification()
    {
        $this->Model('Notification')->DelNotification();
    }
    public function AddNotifi()
    {
        $this->Model('Notification')->add_notification();
        header("Location: ../Admin/notificationManager");
    }
    public function NotificationDetail($maThongBao)
    {
        $data = $this->Model('Notification')->getListByID($maThongBao);
        $this->view("masters", [
            "page" => "admin/showNotificationDetail",
            "Action" => "2",
            "dataNotificationByID" => $data,

        ]);
    }
    public function UpdateNoti()
    {
        $this->Model('Notification')->update_notification();
        header("Location: ../Admin/notificationManager");
    }

    public function classManagement()
    {
        $data = $this->DepartmentModel->getList();
        $this->view("masters", [
            "page" => "admin/listClass",
            "dataDepartments" => $data,
            "Action" => "4"
        ]);
    }
    function AddArticle()
    {
        $check = $this->Article->addArticle();
        if ($check == 0) {
            header("Location: ../Admin/");
        } else if ($check == 1) {
            header("Location: ../Admin/managerArticle");
        }
    }
    function UpdateArticle()
    {
        if (isset($_POST['updateDeTai'])) {
            $this->Article->updateArticle();
            header("Location: ../Admin/managerArticle");
        }
    }

    function ArticleDetail($maDeTai, $maKhoa)
    {
        $dataClass = $this->lop->listByDepartament($maKhoa);
        $data =  $this->Article->getArticleById($maDeTai);
        $dataKhoa = $this->DepartmentModel->getList();
        $Numbermember = $this->Model("Article")->countMember($maDeTai);
        $member = $this->Model("student")->getMembersByCode($maDeTai);
        $this->view("masters", [
            "page" => "admin/showArticleDetail",
            "dataArticleByID" => $data,
            "dataDepartments" => $dataKhoa,
            "dataClass" => $dataClass,
            "Numbermember" => $Numbermember,
            "member" => $member,
            "Action" => "1"
        ]);
    }
    function addClassPage()
    {
        $data = $this->DepartmentModel->getList();
        $this->view("masters", [
            "page" => "admin/addClass",
            "dataDepartments" => $data,
            "Action" => "4",
        ]);
    }
    function addClass()
    {
        //when added class -> direction page ->listClass
        $data = $this->Model("Lop")->addClass();
        if ($data == 0) {
            header("Location: ../Admin/addClassPage");
        } else {
            $datakhoa = $this->DepartmentModel->getList();
            $listClassByDepartment = $this->Model("lop")->listByDepartament($data);
            $this->view("masters", [
                "page" => "admin/listClass",
                "dataDepartments" => $datakhoa,
                "maKhoa_added" => $data,
                "listClassByDepartment" => $listClassByDepartment,
                "Action" => "4"
            ]);
        }
    }
    function DelClass()
    {
        $maKhoa = $this->Model("Lop")->delClass();
        $datakhoa = $this->DepartmentModel->getList();
        $listClassByDepartment = $this->Model("lop")->listByDepartament($maKhoa);
        $this->view("masters", [
            "page" => "admin/listClass",
            "dataDepartments" => $datakhoa,
            "maKhoa_added" => $maKhoa,
            "listClassByDepartment" => $listClassByDepartment,
            "Action" => "4"
        ]);
    }

    function DelArticle()
    {
        $this->Article->delArticle();
    }
}
