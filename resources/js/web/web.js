import './echo';

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

const faceStatus = document.querySelector('.faceStatus');
const faceScore = document.querySelector('.faceScore');
const imgSelfi = document.querySelector('.imgSelfi');
const imgPassport = document.querySelector('.imgPassport');

window.Echo.channel('T5CloudService-Channel')
  .listen('.T5CloudService-Handle', function (e) {
      // Use console.log instead of alert for debugging
      console.log(e);

      // Update faceStatus element
      faceStatus.innerHTML = `
        <span class="${e.faceStatus === 'GOOD' ? 'text-green-500' : 'text-red-500'}">
          ${e.faceStatus}
        </span>
      `;

      // Update faceScore element
      faceScore.innerText = `Face Score : ${e.faceScore}`;

      // Update image sources
      imgSelfi.src = `data:image/jpeg;base64,${e.selfi}`;
      imgPassport.src = `data:image/jpeg;base64,${e.passport}`;
  });
