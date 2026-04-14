// =============================================
//  PrestaLink — Scripts globaux
// =============================================

// Navbar : effet de flou au scroll
const navbar = document.getElementById('navbar');
if (navbar) {
  window.addEventListener('scroll', () => {
    if (window.scrollY > 20) {
      navbar.classList.add('navbar-scroll', 'shadow-sm');
    } else {
      navbar.classList.remove('navbar-scroll', 'shadow-sm');
    }
  });
}

// Smooth scroll sur les ancres internes
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) target.scrollIntoView({ behavior: 'smooth' });
  });
});

