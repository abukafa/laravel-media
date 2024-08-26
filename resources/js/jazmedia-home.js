//.................Middle Container................
let homeMenu = document.querySelector('#homeMenu');
let instagramMenu = document.querySelector('#instagramMenu');
let container = document.querySelector('.middle-container');
let instagram = document.querySelector('.instagram-container');

homeMenu.addEventListener('click', () => {
  container.style.display = 'block';
  instagram.style.display = 'none';
});

instagramMenu.addEventListener('click', () => {
  container.style.display = 'none';
  instagram.style.display = 'block';
});
