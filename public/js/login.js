var eye = document.querySelector("#eye");
eye.addEventListener("click", function () {
  eye.classList.toggle("open");
  if (eye.children[0].classList.contains("fa-eye")) {
    eye.children[0].classList.remove("fa-eye");
    eye.children[0].classList.add("fa-eye-slash");
  } else {
    eye.children[0].classList.remove("fa-eye-slash");
    eye.children[0].classList.add("fa-eye");
  }
  if (eye.classList.contains("open")) {
    eye.previousElementSibling.setAttribute("type", "text");
  } else {
    eye.previousElementSibling.setAttribute("type", "password");
  }
});
