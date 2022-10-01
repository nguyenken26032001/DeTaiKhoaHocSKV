<footer class="main-footer   bottom-0 top-100">
    <strong>Copyright &copy; 2022 <a href="http://spktvinh.edu.vn/">Developer and Design by SKV </a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.1.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="<?php echo _WEB_ROOT_ ?>/public/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo _WEB_ROOT_ ?>/public/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo _WEB_ROOT_ ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo _WEB_ROOT_ ?>/public/plugins/sparklines/sparkline.js"></script>
<script src="<?php echo _WEB_ROOT_ ?>/public/plugins/moment/moment.min.js"></script>
<script src="<?php echo _WEB_ROOT_ ?>/public/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo _WEB_ROOT_ ?>/public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo _WEB_ROOT_ ?>/public/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo _WEB_ROOT_ ?>/public/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo _WEB_ROOT_ ?>/public/dist/js/pages/dashboard.js"></script>
</body>
<script src="<?php echo _WEB_ROOT_ ?>/public/js/admin.js"></script>
<script src="<?php echo _WEB_ROOT_ ?>/public/js/toastMessage.js"></script>
<script src="<?php echo _WEB_ROOT_ ?>/public/js/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $("#content").summernote({
            placeholder: 'Nhập và chỉnh sửa nội dung thông báo.',
            height: 330
        });
    });
</script>


<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
?>
    <script>
        swal({
            title: "",
            text: "<?php echo $_SESSION['status'] ?>",
            icon: "<?php echo $_SESSION['status_code'] ?>",
            button: "ok",
        });
    </script>
<?php
    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
}
?>

<script>
    function updatedata(numberMember) {
        var data = "";
        for (i = 1; i <= numberMember; i++) {
            data += "<label>Thành viên thứ " + i + "</label>" +
                "<div class='row'>" +
                "<div class='col-md-3'>" +
                "<div class='form-group'>" +
                "<label for='usr'>Họ Tên </label>" +
                `<input required='true' type='text' class='form-control' name="name_MB${i}">` +
                "</div>" +
                "</div>" +
                "<div class='col-md-2'>" +
                "<div class='form-group'>" +
                "<label>Đơn Vị </label>" +
                `<select class='form-control' name="khoa_MB${i}" id="${i}" onchange='FetchDepartment(this.value,this)'>` +
                "<?php
                    foreach ($dataKhoa as $item) {
                        echo '<option value=' . $item['maKhoa'] . '>' . $item['tenKhoa'] . '</option>';
                    }
                    ?>" +
                "</select>" +
                "</div>" +
                "</div>" +
                "<div class='col-md-3'>" +
                "<div class='form-group'>" +
                "<label for='pwd'>Hệ Đào Tạo</label>" +
                `<select class='form-control' name="he_MB${i}" id="${i}" onchange="FetchDataHeDaoTao(this.value,$('#${i}').val(),this)">` +
                "<option value='Đại học chính quy'>Đại học chính quy</option>" +
                "<option value='Cao đẳng chính quy'>Cao đẳng chính quy</option>" +
                "</select>" +
                "</div>" +
                "</div>" +
                "<div class='col-md-2'>" +
                "<div class='form-group'>" +
                "<label for='pwd'>Lớp:</label>" +
                `<select class='form-control' name="lop_MB${i}" id="lop${i}">` +
                "</select>" +
                " </div>" +
                "</div>" +
                "<div class='col-md-2'>" +
                "<div class='form-group'>" +
                "<label style='text-justify: center;'>Khóa</label>" +
                `<select class='form-control' name="nienKhoa_MB${i}">` +
                "<option value='2019-2023'>2019-2023</option>" +
                "<option value='2020-2024'>2020-2024</option>" +
                "<option value='2021-2025'>2021-2025</option>" +
                "<option value='2022-2026'>2022-2026</option>" +
                "</select>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>";
        }
        $("#addMember").append(data);
    }
</script>

</html>