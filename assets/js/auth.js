document.addEventListener('DOMContentLoaded', () => {
  const buttons = document.querySelectorAll('.role-btn');
  const forms = document.querySelectorAll('.login-form');
  const slider = document.querySelector('.slider');

  buttons.forEach((btn, index) => {
    btn.addEventListener('click', () => {
      const role = btn.dataset.role;

      // Toggle active button
      buttons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      // Toggle forms
      forms.forEach(form => {
        form.classList.toggle(
          'show',
          form.dataset.role === role
        );
      });

      // Move slider
      slider.style.transform =
        role === 'staff' ? 'translateX(100%)' : 'translateX(0)';
    });
  });
});
