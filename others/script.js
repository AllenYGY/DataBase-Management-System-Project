const sidebar = document.getElementById('sidebar');
const nav = document.getElementById('navbar');
const content = document.querySelector('.content');
const toggleBtn = document.getElementById('toggleBtn');

toggleBtn.addEventListener('click', function() {
  sidebar.classList.toggle('collapsed');
  if (sidebar.classList.contains('collapsed')) {
    sidebar.style.width = '50px'; // 将边栏固定为 50px 宽度
    nav.style.width = 'calc(100%)'; // 导航栏占据剩余宽度
    content.style.marginLeft = '50px'; // 为内容区域添加左边距，以留出边栏的空间
  } else {
    sidebar.style.width = '250px'; // 边栏默认宽度
    nav.style.width = ''; // 恢复导航栏默认宽度
    content.style.marginLeft = '250px'; // 为内容区域添加左边距，以留出边栏的空间
  }
});
