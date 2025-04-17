// Scroll animations
document.querySelectorAll('[data-aos]').forEach(el => {
    el.style.opacity = '0';
    
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('aos-animate');
        }
      });
    }, { threshold: 0.1 });
    
    observer.observe(el);
  });
  
  // Mobile menu toggle
  document.querySelector('.hamburger').addEventListener('click', () => {
    document.querySelector('.main-nav').classList.toggle('active');
  });
