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

// 点击按钮时显示弹窗
openPop.addEventListener("click", function () {
  popup.style.display = "block";
  console.log(popup);
});

// 关闭弹窗函数
function closeForm() {
  popup.style.display = "none";
}
