var root = document.location.origin;
var folderRoots = document.location.pathname;
var folderRoot = folderRoots.split("/")[1];
var pathRoot = root + "/" + folderRoot;

var navLinks = document.querySelectorAll(".nav-link");
var linkAction = document.querySelector(".setActive").textContent;
for (let i = 0; i < navLinks.length; i++) {
  [...navLinks].forEach((navLinkItem) => {
    navLinkItem.classList.remove("active");
  });
  navLinks[linkAction - 1].classList.add("active");
}
//*select class by DepartmentName
function FetchDepartment(valueKhoa, idValue) {
  $("#lop" + idValue.id).html("");
  $.ajax({
    type: "post",
    url: `${pathRoot}/Ajax/getClass`,
    data: {
      maKhoa: valueKhoa,
    },
    success: function (data) {
      $("#lop" + idValue.id).html(data);
    },
  });
}
//*select class by he dao tao
function FetchDataHeDaoTao(he, khoa, idvalue) {
  $("#lop" + idvalue.id).html("");
  $.ajax({
    type: "post",
    url: `${pathRoot}/Ajax/getClassDetail`,
    data: {
      heDaoTao: he,
      khoa: khoa,
    },
    success: function (data) {
      $("#lop" + idvalue.id).html(data);
    },
  });
}
//* funcition load member data
function load() {
  $("#addMember").empty();
  var number = $("#member").val();
  if (number <= 0 || number === "") {
    document.getElementById("addMember").style.display = "none";
  }
  if (number > 0) {
    document.getElementById("addMember").style.display = "block";
    updatedata(number);
  }
}
//change data table
function changeDataTable(khoa) {
  $("#dataTable").html("");
  $.ajax({
    type: "post",
    url: "../Ajax/getClassTable",
    data: {
      maKhoa: khoa,
    },
    success: function (data) {
      $("#dataTable").html(data);
    },
  });
}
function updateLop(he, maKhoa) {
  $("#dataTable").html("");
  $.ajax({
    type: "post",
    url: "../Ajax/getClassTableDetails",
    data: {
      heDaoTao: he,
      khoa: maKhoa,
    },
    success: function (data) {
      $("#dataTable").html(data);
    },
  });
}
var rows = document.querySelectorAll("tr[data-href]");
rows.forEach((row) => {
  row.addEventListener("click", () => {
    window.location.href = row.dataset.href;
  });
});
//function update data for showArticleDetail
//get document root

function deleteArticle(codeArticle) {
  var question = confirm(
    "Bạn chắc chắn muốn xóa tất cả thông tin về đề tài này ?"
  );
  if (question) {
    $.ajax({
      type: "post",
      url: `${pathRoot}/Admin/DelArticle`,
      data: {
        maDeTai: codeArticle,
      },
      success: function (data) {
        window.location = `${pathRoot}/Admin/managerArticle`;
      },
    });
  } else {
    return false;
  }
}
function deleteClass(maLop, maKhoa) {
  var question = confirm(
    "Bạn có chắc chắn muốn xóa lớp: " + maLop + " này không ?"
  );
  if (question) {
    $.ajax({
      type: "post",
      url: `${pathRoot}/Admin/DelClass`,
      data: {
        maLop: maLop,
        maKhoa: maKhoa,
      },
      success: function () {
        swal({
          title: "",
          text: "Xóa lớp thành công !",
          icon: "success",
          button: "ok!",
        });
        document.getElementById(maLop).style.display = "none";
      },
    });
  } else return false;
}
function deleteNotification(id) {
  var question = confirm("Bạn chắc chắn muốn xóa thông báo này ?");
  if (question) {
    $.ajax({
      type: "post",
      url: `${pathRoot}/Admin/DelNotification`,
      data: {
        id: id,
      },
      success: function (data) {
        window.location = `${pathRoot}/Admin/notificationManager`;
      },
    });
  } else {
    return false;
  }
}
function deletePost(id) {
  var question = confirm("Bạn chắc chắn muốn xóa bài đăng này ?");
  if (question) {
    $.ajax({
      type: "post",
      url: `${pathRoot}/Admin/DelPost`,
      data: {
        maDeTai: id,
      },
      success: function (data) {
        window.location = `${pathRoot}/Admin/postManager`;
      },
    });
  } else {
    return false;
  }
}
//* thống kê dữ liệu
function DuLieuThongKe(value) {
  $.ajax({
    type: "POST",
    url: `${pathRoot}/Statistical/statistical_By_Derpartment`,
    data: {
      value: value,
    },
    success: function (data) {
      $("#tableThongKe").html(data);
    },
  });
}
//read url when changed img banner
function previewImage() {
  var file = document.getElementById("file").files;
  if (file.length > 0) {
    var fileReader = new FileReader();

    fileReader.onload = function (event) {
      document
        .getElementById("changeImage")
        .setAttribute("src", event.target.result);
    };

    fileReader.readAsDataURL(file[0]);
  }
}
