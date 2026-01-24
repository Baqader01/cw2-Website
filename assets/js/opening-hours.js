function showWeek(week) {
  const isThis = week === 'current';

  const thisTable = document.getElementById('this-week-table');
  const nextTable = document.getElementById('next-week-table');
  const label = document.getElementById('week-label');
  const editBtn = document.getElementById('edit-week-btn');

  if (!thisTable || !nextTable || !label) return;

  thisTable.style.display = isThis ? 'table' : 'none';
  nextTable.style.display = isThis ? 'none' : 'table';

  label.textContent = isThis
    ? label.dataset.thisWeek
    : label.dataset.nextWeek;

  if (editBtn) {
    editBtn.href = "/website/public/opening/edit?week=" + week;
  }
}

document.addEventListener('DOMContentLoaded', () => {
  const btnThis = document.getElementById('show-this-week');
  const btnNext = document.getElementById('show-next-week');

  if (!btnThis || !btnNext) return;

  btnThis.addEventListener('click', () => showWeek('current'));
  btnNext.addEventListener('click', () => showWeek('next'));
});
