const openBtn = document.querySelector('.button');
const overlay = document.getElementById('overlay');
const closeBtn = document.getElementById('close-btn');

openBtn.addEventListener('click', () => {
    overlay.style.display = 'flex';
});

closeBtn.addEventListener('click', () => {
    overlay.style.display = 'none';
});
