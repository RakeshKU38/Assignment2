document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('regForm');
  const submitBtn = document.getElementById('submitBtn');
  const resetBtn = document.getElementById('resetBtn');

  function showHint(name, msg){
    const s = document.querySelector(`.hint[data-for="${name}"]`);
    if (s) {
      s.textContent = msg;
      s.style.color = 'var(--danger)';
      setTimeout(()=>{ s.textContent = ''; s.style.color = ''; }, 3000);
    }
  }

  form.addEventListener('submit', (e) => {
    const fname = form.first_name.value.trim();
    const email = form.email.value.trim();
    const phone1 = form.phone1.value.trim();
    const course = form.course.value.trim();
    let blocked = false;

    if (!fname) { showHint('first_name','Required'); blocked = true; }
    if (!email) { showHint('email','Required'); blocked = true; }
    if (!phone1) { showHint('phone1','Required'); blocked = true; }
    if (!course) { showHint('course','Select a course'); blocked = true; }

    if (blocked) e.preventDefault();

    submitBtn.disabled = true;
    submitBtn.textContent = 'Submitting...';
  });

  resetBtn.addEventListener('click', () => {
    form.reset();
  });
});
