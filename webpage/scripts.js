async function loadLeaderboard() {
  try {
    const res = await fetch('get_scores.php');
    const data = await res.json();

    const tbody = document.querySelector('#leaderboard tbody');
    tbody.innerHTML = '';

    data.forEach((row, i) => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${i + 1}</td>
        <td>${row.name}</td>
        <td>${row.score}</td>
        <td>${row.created_at}</td>
      `;
      tbody.appendChild(tr);
    });
  } catch (err) {
    console.error('Error loading leaderboard:', err);
  }
}
loadLeaderboard();
