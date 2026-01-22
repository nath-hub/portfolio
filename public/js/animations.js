document.addEventListener('DOMContentLoaded', function () {
  const els = document.querySelectorAll('.fade-in');

  if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.08 });

    els.forEach(el => io.observe(el));
  } else {
    // Fallback: simply show all
    els.forEach(el => el.classList.add('visible'));
  }

  // Typing effect for .typing-text (simple)
  const typingEls = document.querySelectorAll('.typing-text');
  typingEls.forEach(el => {
    const text = el.getAttribute('data-text') || el.textContent || '';
    el.textContent = '';
    let i = 0;
    const speed = 120;
    const timer = setInterval(() => {
      el.textContent += text.charAt(i);
      i++;
      if (i >= text.length) clearInterval(timer);
    }, speed);
  });
});
