function initializeSidebar() {
    const links = document.querySelectorAll('#sidebar .side-menu li');
  
    links.forEach(link => {
      link.addEventListener('click', () => {
        removeActiveClassFromLinks();
        link.classList.add('active');
      });
    });
  
    function removeActiveClassFromLinks() {
      links.forEach(link => {
        link.classList.remove('active');
      });
    }
  }
  
  initializeSidebar();