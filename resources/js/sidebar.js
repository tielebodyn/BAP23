const sidebar = document.getElementById('sidebar');
const sidebarToggle = document.getElementById('sidebar-toggle');
sidebarToggle.addEventListener('click', function(e) {
sidebar.classList.toggle('-translate-x-full');
// on mousclick outside of sidebar
document.addEventListener('click', function(e) {
  const target = e.target;
  if (sidebar.classList.contains('-translate-x-full')) {
    return;
  }
  if (sidebarToggle.contains(target)) {
    return;
  }
  if (sidebar.contains(target)) {
    return;
  }
  sidebar.classList.add('-translate-x-full');
});
});
