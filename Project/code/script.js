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

const rightcontentElement = document.querySelector(".right-content");
const editElement = document.getElementById("editButton");

let clickCount = 0;

openPop.addEventListener("click", function () {
  clickCount++; // 每次点击增加点击次数

  if (clickCount % 2 === 1) {
    // 奇数次点击，打开弹出窗口
    popup.style.display = "grid";
    // 修改 main 元素的 margin
    rightcontentElement.style.display = "none";
    console.log("Popup opened");
  } else {
    // 偶数次点击，关闭弹出窗口
    popup.style.display = "none";
    rightcontentElement.style.display = "grid";
    // 恢复 main 元素的默认 margin
    console.log("Popup closed");
  }
});

const homeNavItem = document.getElementById("homeNavItem");
const profileNavItem = document.getElementById("profileNavItem");
const pickPackageNavItem = document.getElementById("pickPackageNavItem");
const sendPackageNavItem = document.getElementById("sendPackageNavItem");
const searchNavItem = document.getElementById("searchNavItem");
const historyNavItem = document.getElementById("historyNavItem");

const pickimg = document.getElementById("pickimg");
const sendimg = document.getElementById("sendimg");
const acceptbtn = document.getElementById("acceptbtn");
const checkbtn1 = document.getElementById("checkbtn1");
const checkbtn2 = document.getElementById("checkbtn2");

const leftcontentElement = document.querySelector(".left-content");
const profileElement = document.querySelector(".profile");
const friendslistElement = document.querySelector(".friends-list");
const pickPartElement = document.querySelector(".pickpart");
const sendPartElement = document.querySelector(".sendpart");
const searchhistoryElement = document.querySelector(".search-hitorypart");

profileNavItem.addEventListener("click", () => {
  console.log("Profile Successfully!");
  leftcontentElement.style.display = "none";
  sendPartElement.style.display = "none";
  pickPartElement.style.display = "none";
  popup.style.display = "none";
  searchhistoryElement.style.display = "none";

  rightcontentElement.style.display = "grid";
  profileElement.style.display = "grid";
  friendslistElement.style.display = "grid";
});

function handlePickClick() {
  console.log("Pick Successfully!");
  leftcontentElement.style.display = "none";
  sendPartElement.style.display = "none";
  profileElement.style.display = "none";
  popup.style.display = "none";
  searchhistoryElement.style.display = "none";
  homeNavItem.className = "nav-item";

  rightcontentElement.style.display = "grid";
  pickPartElement.style.display = "grid";

  pickPackageNavItem.className = "nav-item active";
}
// 在 pickimg 上添加点击事件监听器
pickimg.addEventListener("click", handlePickClick);
// 在 pickPackageNavItem 上添加点击事件监听器
pickPackageNavItem.addEventListener("click", handlePickClick);
acceptbtn.addEventListener("click", handlePickClick);

// 发送操作的处理函数
function handleSendClick() {
  console.log("Send Successfully!");
  leftcontentElement.style.display = "none";
  pickPartElement.style.display = "none";
  profileElement.style.display = "none";
  popup.style.display = "none";
  searchhistoryElement.style.display = "none";
  homeNavItem.className = "nav-item";
  rightcontentElement.style.display = "grid";
  sendPartElement.style.display = "grid";
  sendPackageNavItem.className = "nav-item active";
}

sendimg.addEventListener("click", handleSendClick);
sendPackageNavItem.addEventListener("click", handleSendClick);

// 发送操作的处理函数
function handleHistoryClick() {
  console.log("SearchHistory Successfully!");
  leftcontentElement.style.display = "none";
  pickPartElement.style.display = "none";
  profileElement.style.display = "none";
  popup.style.display = "none";
  sendPartElement.style.display = "none";
  homeNavItem.className = "nav-item";
  rightcontentElement.style.display = "grid";
  searchhistoryElement.style.display = "grid";
  historyNavItem.className = "nav-item active";
}

function handleSearchClick() {
  console.log("SearchHistory Successfully!");
  leftcontentElement.style.display = "none";
  pickPartElement.style.display = "none";
  profileElement.style.display = "none";
  popup.style.display = "none";
  sendPartElement.style.display = "none";
  homeNavItem.className = "nav-item";
  historyNavItem.className = "nav-item";
  rightcontentElement.style.display = "grid";
  searchhistoryElement.style.display = "grid";
  searchNavItem.className = "nav-item active";
}

searchNavItem.addEventListener("click", handleSearchClick);
historyNavItem.addEventListener("click", handleHistoryClick);
checkbtn1.addEventListener("click", handleHistoryClick);
checkbtn2.addEventListener("click", handleHistoryClick);

function fillForm(pID) {
  document.getElementById("packageid").value = pID;
  console.log(pID);
}

document
  .getElementById("send_parcel_form")
  .addEventListener("submit", function (event) {
    let startadr = document.getElementById("startadr").value;
    let endadr = document.getElementById("endadr").value;

    if (startadr === endadr) {
      alert("Mailing address and Receiving address cannot be the same.");
      event.preventDefault();
    }
  });

function showAlert() {
  var confirmLogout = confirm("Are you sure you want to log off?");
  if (confirmLogout) {
    window.location.href = "14_logoff.php"; // 替换成你想要跳转的页面
  }
}

var collapseContainer = document.querySelector(".collapse-container");
collapseContainer.onclick = function (e) {
  if (e.target.tagName.toLowerCase() == "i") {
    let itemContent =
      e.target.parentNode.parentNode.querySelector(".item-content");
    itemContent.classList.toggle("item-content-on");
  }
};

document.getElementById("Search").addEventListener("click", function () {
  if (collapseContainer.style.display !== "none") {
    collapseContainer.style.display = "none";
  } else {
    collapseContainer.style.display = "block";
  }
  searchNavItem.className = "nav-item active";
});
