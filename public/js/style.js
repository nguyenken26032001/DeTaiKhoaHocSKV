var body = document.querySelector("body");
var address = document.querySelector(".address--detail");
var schoolFooter = document.querySelector(".school");
var copyright = document.querySelector(".copyright");
var addressResponse = document.querySelector(".address--responsive");
var iconCopyRight = document.querySelector(".icon--copyright");
var widthBody = body.offsetWidth;
if (widthBody <= 767) {
  address.innerHTML =
    "Địa Chỉ: P201 tầng 5 nhà A1 Trường Đại học Sư phạm kỹ thuật Vinh";
  addressResponse.innerHTML = "117 Nguyễn Viết Xuân, Phường Hưng Dũng, TP Vinh";
  schoolFooter.innerHTML = "Trường Đại học Sư phạm kỹ thuật Vinh";
  copyright.style.display = "none";
  iconCopyRight.style.display = "none";
}
