<?php
// if (isset($_SESSION['status'])) {


class Admin extends controller
{
    public $DepartmentModel;
    public $Article;
    public $lop;
    function __construct()
    {
        if (empty($_SESSION['account'])) {
            header("Location:" . _WEB_ROOT_ . '/login');
        }
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
        if (isset($_GET["search"])) {
            $maDeTai = $_GET['search'];
            $data = $this->Article->getArticleById($maDeTai);
            if (!empty($data)) {
                $_SESSION['dataSearch'] = $maDeTai;
                $this->view("masters", [
                    "page" => "admin/managerArticle",
                    "Action" => "1",
                    "dataArticle" => $data,
                ]);
            } else {
                $_SESSION['status'] = "Thông tin về đề tài này không tồn tại !";
                $_SESSION['status_code'] = "error";
                header("Location: ../Admin/managerArticle");
            }
        } else {
            $data = $this->Article->getArticleList();
            $this->view("masters", [
                "page" => "admin/managerArticle",
                "Action" => "1",
                "dataArticle" => $data,
            ]);
        }
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
        $data = $this->Model('Notification')->add_notification();
        if ($data == 1) {
            header("Location: ../Admin/notificationManager");
        } else {
            $this->notification();
        }
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
        $id = $_POST['id'];
        $data = $this->Model('Notification')->update_notification();
        if ($data == 1) {
            header("Location: ../Admin/notificationManager");
        } else {
            $this->NotificationDetail($id);
        }
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
            $maDeTai = $_POST['maDeTai'];
            $khoaChuTri = $_POST['khoaChuTri'];
            $data = $this->Article->updateArticle();
            if ($data == 0) {
                $this->ArticleDetail($maDeTai, $khoaChuTri);
            } else {
                header("Location: ../Admin/managerArticle");
            }
        }
    }

    function ArticleDetail($maDeTai, $maKhoa)
    {
        $dataClass = $this->lop->listClassByHost($maKhoa);
        $data =  $this->Article->getArticleById($maDeTai);
        $dataKhoa = $this->DepartmentModel->getList();
        $Numbermember = $this->Model("Article")->countMember($maDeTai);
        $number_gvhd = $this->Model("Article")->countGvhd($maDeTai);
        $member = $this->Model("student")->getMembersByCode($maDeTai);
        $dataClassMember = $this->Model("lop")->getDepartmentAllMembers($maDeTai);
        $listMentor = $this->Model("mentor")->getlistGVHD($maDeTai);
        $this->view("masters", [
            "page" => "admin/showArticleDetail",
            "dataArticleByID" => $data,
            "dataDepartments" => $dataKhoa,
            "dataClass" => $dataClass,
            "Numbermember" => $Numbermember,
            "NumberGvhd" => $number_gvhd,
            "list_Gvhd" => $listMentor,
            "member" => $member,
            "dataClassMember" => $dataClassMember,
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
    function DetailClassByDepartment($maKhoa)
    {
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

    function addClass()
    {
        //when added class -> direction page ->listClass
        $data = $this->Model("Lop")->addClass();
        if ($data == 0) {
            header("Location: ../Admin/addClassPage");
        } else {
            // $datakhoa = $this->DepartmentModel->getList();
            // $listClassByDepartment = $this->Model("lop")->listByDepartament($data);
            // $this->view("masters", [
            //     "page" => "admin/listClass",
            //     "dataDepartments" => $datakhoa,
            //     "maKhoa_added" => $data,
            //     "listClassByDepartment" => $listClassByDepartment,
            //     "Action" => "4"
            // ]);
            $this->DetailClassByDepartment($data);
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
    //thống kê
    function Statistical()
    {
        $data = $this->Model('thongke')->statistical_By_Derpartment();
        $dataByType = $this->Model('thongke')->statistical_By_Type();
        $totalStudentJoined = $this->Model('thongke')->totalStudent();
        $totalArticle = $this->Model('thongke')->totalArticle();
        $totalArticleXLKha = $this->Model('thongke')->totalArticleXLKha();
        $this->view("masters", [
            "page" => "admin/thongKe",
            "thongKeByKhoa" => $data,
            "thongKeByTypeArticle" => $dataByType,
            "Action" => "6",
            "totalStudent" => $totalStudentJoined,
            "totalArticle" => $totalArticle,
            "totalArticleXLKha" => $totalArticleXLKha,
        ]);
    }
    //feauter post article
    function postArticle()
    {
        $listMaDeTai = $this->Article->getListMaDeTai();
        $this->view("masters", [
            "page" => "admin/PostArticle",
            "Action" => "5",
            "listMaDeTai" => $listMaDeTai,
        ]);
    }
    function postManager()
    {
        if (isset($_GET["search"])) {
            $maDeTai = $_GET['search'];
            $data_search = $this->Model("postArticle")->getListPostById($maDeTai);
            if (!empty($data)) {
                $this->view("masters", [
                    "page" => "admin/postManager",
                    "Action" => "5",
                    "dataPost" => $data_search,
                    "js" => "post.js"

                ]);
            } else {
                $_SESSION['status'] = "Thông tin về đề tài này không tổn tại !";
                $_SESSION['status_code'] = "error";
                header("Location: ../Admin/postManager");
            }
        } else {
            $data = $this->Model("postArticle")->getListPostForAdmin();
            $this->view("masters", [
                "page" => "admin/postManager",
                "Action" => "5",
                "dataPost" => $data,
                "js" => "post.js"

            ]);
        }
    }
    function AddPostArticle()
    {
        $check = $this->Model("postArticle")->addPostArticle();
        if ($check == 0) {
            header("Location: ../Admin/postArticle");
        } else
        if ($check == 1) {
            header("Location: ../Admin/postManager");
        } else {
            header("Location: ../Tintuc/quanLyTin");
        }
    }
    function postNewsDetail($id)
    {
        echo "this is page postnewDetails";
    }
    function postArticleDetail($maDeTai)
    {
        $data = $this->Model("postArticle")->getListPostById($maDeTai);
        $dataMaDeTai = $this->Model("Article")->getListMaDeTai();
        $this->view("masters", [
            "page" => "admin/showPostArticleDetail",
            "Action" => "5",
            "dataPostById" => $data,
            "dataMaDeTai" => $dataMaDeTai
        ]);
    }
    function updatePostArticle()
    {
        $maDeTai = $_POST["maDeTai"];
        $data = $this->Model("postArticle")->updatePostArticle();
        if ($data === 1) {
            header("Location: ../Admin/postManager");
        } else {
            $this->postArticleDetail($maDeTai);
        }
    }
    function DelPost()
    {
        $this->Model("postArticle")->delPost();
    }
    //MANAGER BANNER
    function banner()
    {
        $data = $this->Model("banner")->getbanner();
        $this->view("masters", [
            "page" => "admin/banner",
            "Action" => "7",
            "banner" => $data,
        ]);
    }
    function updateBanner($id)
    {
        $data = $this->Model("banner")->getbannerById($id);
        $this->view("masters", [
            "page" => "admin/updateBanner",
            "Action" => "7",
            "bannerId" => $data,
        ]);
    }
    function updatedBanner()
    {
        $id = $_POST["idBanner"];
        $data = $this->Model("banner")->updateBannerId();
        if ($data == 1) {
            header("Location: ../Admin/banner");
        } else {
            $this->updateBanner($id);
        }
    }
    function document()
    {
        $this->view("masters", [
            "page" => "admin/addDocument",
            "Action" => "3"
        ]);
    }
    //settings
    function settings(){
        $infoAdmin= $this->Model("administrator")->getInfo();
        $this->view("masters", [
            "page" => "admin/settings",
            "inForAdmin" => $infoAdmin,
            "Action" => "8",
            "css"=>"settingSystem.css",
            "js"=>"setting.js"
        ]);
    }

    function logout()
    {
        if (isset($_SESSION['account'])) {
            unset($_SESSION['account']);
            header("Location:" . _WEB_ROOT_);
        }
    }
}