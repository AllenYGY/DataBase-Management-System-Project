const navItems = document.querySelectorAll(".nav-item");

navItems.forEach((navItem, i) => {
  navItem.addEventListener("click", () => {
    navItems.forEach((item, j) => {
      item.className = "nav-item";
    });
    navItem.className = "nav-item active";
  });
});

const openPop = document.getElementById("openPop");
const popup = document.getElementById("popup");
const mainElement = document.querySelector("main");
const editElement =document.getElementById("editButton");

let clickCount = 0;

openPop.addEventListener("click", function () {
  clickCount++; // 每次点击增加点击次数

  if (clickCount % 2 === 1) {
    // 奇数次点击，打开弹出窗口
    popup.style.display = "block";
    // 修改 main 元素的 margin
    mainElement.style.margin = "20px";
    console.log("Popup opened");
  } else {
    // 偶数次点击，关闭弹出窗口
    popup.style.display = "none";
    // 恢复 main 元素的默认 margin
    mainElement.style.margin = "40px";
    console.log("Popup closed");
  }
});

editElement.addEventListener("click",function () {
    popup.style.display = "none";
    mainElement.style.margin = "40px";
});