function toggleSidebar() {
  const sidebar = document.querySelector('.sidebar');
  const header = document.querySelector('.bg-gray-800');
  const toggleBtn = document.querySelector('.toggle-btn');
  const right_header = document.querySelector('.profil')
  const content = document.getElementById('content');
  
  sidebar.classList.toggle('hidden');
  
  if (sidebar.classList.contains('hidden')) {
    // Sidebar ditutup
    header.style.transform = 'translateX(0)';
    content.classList.remove('ml-64');
    right_header.style.transform = 'translateX(0)';
    toggleBtn.style.display = 'block';
  } else {
    // Sidebar dibuka
    const sidebarWidth = sidebar.offsetWidth;
    toggleBtn.style.display = 'none';
    header.style.transform = `translateX(${sidebarWidth}px)`;
    right_header.style.transform = `translateX(${-(sidebarWidth)}px)`;
    content.classList.add('ml-64');
  }
}
function closeSidebar() {
  const sidebar = document.querySelector('.sidebar');
  const header = document.querySelector('.bg-gray-800');
  const toggleBtn = document.querySelector('.toggle-btn');
  const right_header = document.querySelector('.profil');
  const content = document.getElementById('content');

  // Menutup sidebar
  toggleBtn.style.display = 'block';
  sidebar.classList.add('hidden');
  header.style.transform = 'translateX(0)';
  right_header.style.transform = 'translateX(0)';
  content.classList.remove('ml-64');
}