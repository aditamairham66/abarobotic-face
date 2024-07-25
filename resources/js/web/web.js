setInterval(() => {
  window.location.reload();
}, 3000); // Refresh every 3 seconds

function updateClock() {
  const now = new Date();
  const hours = now.getHours().toString().padStart(2, '0');
  const minutes = now.getMinutes().toString().padStart(2, '0');
  const seconds = now.getSeconds().toString().padStart(2, '0');
  const currentTime = `${hours}:${minutes}:${seconds}`;
  document.getElementById('clock').innerText = currentTime;
}

setInterval(updateClock, 1000); // Update clock every second
updateClock(); // Initial call to display clock immediately