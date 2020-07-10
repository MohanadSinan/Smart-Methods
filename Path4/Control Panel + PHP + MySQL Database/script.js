/*=====Theme toggle=====*/
const mode = document.querySelector(".mode");
let body = {
  el: document.querySelector("body"),
  dark: false
};

mode.addEventListener("click", () => {
  if (body.dark === false) {
    body.dark = true;
    body.el.className = "dark";
    mode.textContent = "dark";
  } else {
    body.dark = false;
    body.el.className = "light";
    mode.textContent = "light";
  }
});

const btns = document.querySelectorAll("button");
btns.forEach((btn) => {
  btn.addEventListener("click", () => {
    btn.classList.toggle("active");
  });
});

