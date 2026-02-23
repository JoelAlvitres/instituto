document.addEventListener('DOMContentLoaded', function () {
  console.log('📱 Inicializando navegación móvil...');
  const menuToggle = document.getElementById('menuToggle');
  const mobileMenu = document.getElementById('mobileMenu');
  const menuOverlay = document.getElementById('menuOverlay');
  const closeMenu = document.getElementById('closeMenu');

  if (!menuToggle || !mobileMenu || !menuOverlay) {
    console.error('❌ Error: No se encontraron los elementos del menú móvil en el DOM');
    return;
  }

  function openMenu() {
    console.log('🔓 Abriendo menú');
    mobileMenu.classList.add('active');
    menuOverlay.classList.add('active');
    menuToggle.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeMenuFunc() {
    console.log('🔒 Cerrando menú');
    mobileMenu.classList.remove('active');
    menuOverlay.classList.remove('active');
    menuToggle.classList.remove('active');
    document.body.style.overflow = '';
  }

  menuToggle.addEventListener('click', function (e) {
    e.preventDefault();
    openMenu();
  });

  if (closeMenu) {
    closeMenu.addEventListener('click', function (e) {
      e.preventDefault();
      closeMenuFunc();
    });
  }

  menuOverlay.addEventListener('click', function (e) {
    e.preventDefault();
    closeMenuFunc();
  });

  // Cerrar menú al hacer clic en enlaces
  document.querySelectorAll('.mobile-menu-nav a').forEach(link => {
    link.addEventListener('click', closeMenuFunc);
  });

  // Cerrar con tecla ESC
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
      closeMenuFunc();
    }
  });

  // Ajustar viewport en móviles
  function setVH() {
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
  }

  setVH();
  window.addEventListener('resize', setVH);
  console.log('✅ Navegación móvil lista');
});

