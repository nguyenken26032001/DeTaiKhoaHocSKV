// var eye = document.querySelector("#eye");
// eye.addEventListener("click", function () {
//   eye.classList.toggle("open");
//   if (eye.children[0].classList.contains("fa-eye")) {
//     eye.children[0].classList.remove("fa-eye");
//     eye.children[0].classList.add("fa-eye-slash");
//   } else {
//     eye.children[0].classList.remove("fa-eye-slash");
//     eye.children[0].classList.add("fa-eye");
//   }
//   if (eye.classList.contains("open")) {
//     eye.previousElementSibling.setAttribute("type", "text");
//   } else {
//     eye.previousElementSibling.setAttribute("type", "password");
//   }
// });
let pass = document.getElementById("password");
let togglepass = document.getElementById("tooglebtn");
togglepass.onclick = function () {
  if (pass.type === "password") {
    pass.setAttribute("type", "text");
    togglepass.classList.add("hide");
  } else {
    pass.setAttribute("type", "password");
    togglepass.classList.remove("hide");
  }
};
