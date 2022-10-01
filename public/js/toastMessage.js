function loadToast(checkUpdate) {
  if (checkUpdate == "update") {
    createToast("update");
  } else if (checkUpdate == "add") {
    createToast("added");
  } else if (checkUpdate == "delete") {
    createToast("added");
  }
}
const toasts = {
  update: {
    icon: '<i class="fas fa-check-circle"></i>',
    msg: "Cập nhật dữ liệu thành công !",
  },
  added: {
    icon: '<i class="fas fa-check-circle"></i>',
    msg: "Thêm dữ liệu thành công !",
  },
};

function createToast(status) {
  let notifi = document.createElement("div");
  notifi.className = `notifi ${status}`;

  notifi.innerHTML = `
      ${toasts[status].icon}
      <span class="msg">${toasts[status].msg}</span>
      <span class="countdown"></span>
      `;
  document.querySelector("#notifi").appendChild(notifi);

  setTimeout(() => {
    notifi.style.animation = "hide_slide 1s ease forwards";
  }, 4000);
  setTimeout(() => {
    notifi.remove();
  }, 5000);
}
