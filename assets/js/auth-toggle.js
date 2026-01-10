document.querySelectorAll('.role-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    const role = btn.dataset.role;

    // Toggle active button
    document.querySelectorAll('.role-btn').forEach(b =>
      b.classList.toggle('active', b === btn)
    );


    // Toggle forms
    document.querySelectorAll('.login-form').forEach(form => {
      form.classList.toggle(
        'show',
        form.querySelector('input[name="role"]').value === role
      );

        const errorBox = document.querySelector('.error-box');
        if (errorBox) {
            errorBox.remove();
        }
    });

    // Move slider
    const slider = document.querySelector('.slider');
    slider.style.transform = role === 'staff'
      ? 'translateX(100%)'
      : 'translateX(0)';
    });


});
