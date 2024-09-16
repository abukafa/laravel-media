//................. Star Rating ................
var star1 = document.getElementById('star1');
var star2 = document.getElementById('star2');
var star3 = document.getElementById('star3');
var star4 = document.getElementById('star4');
var star5 = document.getElementById('star5');

var stars = [star1, star2, star3, star4, star5];
var btnRate = document.getElementById('btn-rate');

let s = 1;
function addStyle(n) {
  for (let i = 0; i < n; i++) {
    stars[i].classList.add('star-color');
  }
}
function removeStyle(n) {
  for (let i = n; i < 5; i++) {
    stars[i].classList.remove('star-color');
  }
}

stars.forEach((star, index) => {
  star.addEventListener('click', function () {
    addStyle(index + 1);
    removeStyle(index + 1);
    btnRate.textContent = index + 1 + ' Rates';
    document.getElementById('rate').value = index + 1;
  });
});

//.............. ...Start Swiper Story ................
import Swiper from 'swiper';
let swiper = new Swiper('.mySwiper', {
  slidesPerView: 5,
  spaceBetween: 5
});

// ..................Window Scroll.................
window.addEventListener('scroll', () => {
  document.querySelector('.profile-popup').style.display = 'none';
  document.querySelector('.add-post-popup').style.display = 'none';
  document.querySelector('.notify-popup').style.display = 'none';
  document.querySelector('.rating-popup').style.display = 'none';
  document.querySelector('.signin-popup').style.display = 'none';
  document.querySelector('.signup-popup').style.display = 'none';
  document.querySelector('.theme-customize').style.display = 'none';
});

// .......................Start Aside...................
let menuItem = document.querySelectorAll('.menu-item');

// Active remove..
const removeActive = () => {
  menuItem.forEach(item => {
    item.classList.remove('active');
  });
};

menuItem.forEach(item => {
  item.addEventListener('click', () => {
    removeActive();
    item.classList.add('active');
  });
});

// ........................Notifcation................

let notificationMenu = document.querySelector('#Notify-box');
let notfyCounter1 = document.querySelector('#ntCounter1');

notificationMenu.addEventListener('click', () => {
  notfyCounter1.style.display = 'none';
});

// ...............Start..Firend Rquestt...............
let Accept = document.querySelectorAll('#Accept');
let Dlete = document.querySelectorAll('#Delete');

Accept.forEach(accept => {
  accept.addEventListener('click', () => {
    accept.parentElement.style.display = 'none';
    accept.parentElement.parentElement.querySelector('.alert').style.display = 'block';
  });
});
Dlete.forEach(deletee => {
  deletee.addEventListener('click', () => {
    deletee.parentElement.parentElement.style.display = 'none';
  });
});

//.............. ...Start Profile Popup................
let AllMyProfilePicture = document.querySelectorAll('#my-profile-picture');
let profilePopup = document.querySelector('.profile-popup');
let addPostPopup = document.querySelector('.add-post-popup');
let notifyPopup = document.querySelector('.notify-popup');
let ratingPopup = document.querySelector('.rating-popup');
let signinPopup = document.querySelector('.signin-popup');
let signupPopup = document.querySelector('.signup-popup');
let alertPopup = document.querySelector('.alert-popup');
let themeCustomizePopup = document.querySelector('.theme-customize');

AllMyProfilePicture.forEach(AllProfile => {
  AllProfile.addEventListener('click', () => {
    profilePopup.style.display = 'flex';
  });
});

document.querySelectorAll('.close').forEach(AllCloser => {
  AllCloser.addEventListener('click', () => {
    profilePopup.style.display = 'none';
    addPostPopup.style.display = 'none';
    notifyPopup.style.display = 'none';
    ratingPopup.style.display = 'none';
    signinPopup.style.display = 'none';
    signupPopup.style.display = 'none';
    alertPopup.style.display = 'none';
    themeCustomizePopup.style.display = 'none';
  });
});

document.querySelector('#feed-pic-upload').addEventListener('change', () => {
  document.querySelector('#postIMg').src = URL.createObjectURL(document.querySelector('#feed-pic-upload').files[0]);
});

// Assuming #feeds-load is the container where .star-rating elements are added
let form = document.getElementById('rating-form');
let feedsLoadContainer = document.getElementById('feeds-load');

if (feedsLoadContainer) {
  feedsLoadContainer.addEventListener('click', function (event) {
    let element = event.target.closest('.star-rating');
    if (element) {
      const rate = element.getAttribute('data-rate');
      const id = element.getAttribute('data-id');
      if (!form) {
        console.error('Form not found!');
        return;
      }
      if (rate == 0) {
        ratingPopup.style.display = 'flex';
        form.setAttribute('action', '/task/rating/' + id);
      }
    }
  });
}

//.................Sign Up Popup................
let registering = document.querySelector('.signUp');
registering.addEventListener('click', () => {
  signinPopup.style.display = 'none';
  signupPopup.style.display = 'flex';
});

document.querySelectorAll('.signIn').forEach(element => {
  element.addEventListener('click', () => {
    signupPopup.style.display = 'none';
    signinPopup.style.display = 'flex';
  });
});

//.................Input Register Typing................
let password = document.querySelector('#password');
let retype = document.querySelector('#retype');
let username = document.querySelector('#username');

password.addEventListener('keyup', () => {
  if (password.value.length < 4) {
    password.parentNode.classList.add('input-warning');
  } else {
    password.parentNode.classList.remove('input-warning');
  }
});

retype.addEventListener('keyup', () => {
  if (password.value !== retype.value) {
    retype.parentNode.classList.add('input-warning');
  } else {
    retype.parentNode.classList.remove('input-warning');
  }
});

username.addEventListener('keyup', () => {
  if (username.value.length < 4) {
    username.parentNode.classList.add('input-warning');
  } else {
    username.parentNode.classList.remove('input-warning');
  }
});

//.................Start Notify Popup................
let notifyBox = document.querySelector('#Notify-box');

notifyBox.addEventListener('click', () => {
  notifyPopup.style.display = 'flex';
});

// ......................Theme CustoMize........................
let theme = document.querySelector('.theme-customize');
document.querySelector('#theme').addEventListener('click', () => {
  theme.style.display = 'flex';
});

//................... Font Size..................
let fontSize = document.querySelectorAll('.choose-size span');

const removeActiveSelector = () => {
  fontSize.forEach(size => {
    size.classList.remove('active');
  });
};

fontSize.forEach(size => {
  size.addEventListener('click', () => {
    let fontSize;
    removeActiveSelector();
    size.classList.toggle('active');

    if (size.classList.contains('font-size-1')) {
      fontSize = '10px';
    } else if (size.classList.contains('font-size-2')) {
      fontSize = '13px';
    } else if (size.classList.contains('font-size-3')) {
      fontSize = '16px';
    } else if (size.classList.contains('font-size-4')) {
      fontSize = '19px';
    } else if (size.classList.contains('font-size-5')) {
      fontSize = '22px';
    }
    // Html root fontsize change...
    document.querySelector('html').style.fontSize = fontSize;
  });
});

//................... Primary Color..................

let colorpallete = document.querySelectorAll('.choose-color span');
var root = document.querySelector(':root');

// remove coloractive........
const removeActiveColor = () => {
  colorpallete.forEach(color => {
    color.classList.remove('active');
  });
};

colorpallete.forEach(color => {
  color.addEventListener('click', () => {
    let primaryHue;
    let Hue;
    removeActiveColor();
    color.classList.add('active');

    if (color.classList.contains('color-1')) {
      Hue = 252;
    } else if (color.classList.contains('color-2')) {
      Hue = 52;
    } else if (color.classList.contains('color-3')) {
      Hue = 352;
    } else if (color.classList.contains('color-4')) {
      Hue = 152;
    } else if (color.classList.contains('color-5')) {
      Hue = 202;
    }
    root.style.setProperty('--primary-color-hue', Hue);
  });
});

//...................Background Change..................

let bg1 = document.querySelector('.bg1');
let bg2 = document.querySelector('.bg2');

// Theme Background value.....
let darkColorLightTheme;
let lightColorLightTheme;
let whiteColorLightTheme;

const changBg = () => {
  root.style.setProperty('--color-dark-light-theme', darkColorLightTheme);
  root.style.setProperty('--color-light-light-theme', lightColorLightTheme);
  root.style.setProperty('--color-white-light-theme', whiteColorLightTheme);
};

bg2.addEventListener('click', () => {
  darkColorLightTheme = '95%';
  lightColorLightTheme = '5%';
  whiteColorLightTheme = '12%';

  //Add active class
  bg2.classList.add('active');
  bg1.classList.remove('active');

  bgicon();
  changBg();
});
bg1.addEventListener('click', () => {
  //Add active class
  bg1.classList.add('active');
  bg2.classList.remove('active');

  window.location.reload();
});

// Dark Theme Aside Icon.....
let menuItemImg = document.querySelectorAll('.menu-item span img');

const bgicon = () => {
  menuItemImg.forEach(icon => {
    icon.classList.add('icon-bg');
  });
};

// document.addEventListener('DOMContentLoaded', function () {
//   // LIKE
//   document.getElementById('feeds-load').addEventListener('click', function (event) {
//     if (event.target && event.target.classList.contains('like-button')) {
//       var taskId = event.target.getAttribute('data-task-id');
//       likeTask(taskId, event.target.closest('.feed'));
//     }

//     if (event.target && event.target.classList.contains('mark-button')) {
//       var taskId = event.target.getAttribute('data-task-id');
//       markTask(taskId, event.target.closest('.feed'));
//     }
//   });

//   function likeTask(taskId, feedElement) {
//     var csrfToken = '{{ csrf_token() }}';

//     var xhr = new XMLHttpRequest();
//     var url = `/task/${taskId}/like`;

//     console.log('Like URL:', url);

//     xhr.open('POST', url, true);
//     xhr.setRequestHeader('Content-Type', 'application/json');
//     xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

//     xhr.onreadystatechange = function () {
//       if (xhr.readyState === 4) {
//         if (xhr.status === 200) {
//           var response = JSON.parse(xhr.responseText);
//           console.log('Like Response:', response);

//           var actionButton = feedElement.querySelector('.action-button');
//           var likesCountElement = actionButton.nextElementSibling.querySelector('.likes-count');
//           var likesFirstElement = actionButton.nextElementSibling.querySelector('.likes-first');
//           var likesIcon = actionButton.querySelector('.likes-icon');

//           if (likesCountElement && likesIcon) {
//             likesFirstElement.innerText = response.first_like;
//             likesCountElement.innerText = response.likes_count;
//             likesIcon.classList.toggle('liked');
//           }
//         } else {
//           console.error('Error liking:', xhr.responseText);
//         }
//       }
//     };

//     xhr.send(JSON.stringify({ task_id: taskId }));
//   }

//   function markTask(taskId, feedElement) {
//     var csrfToken = '{{ csrf_token() }}';

//     var xhr = new XMLHttpRequest();
//     var url = `/task/${taskId}/bookmark`;

//     console.log('Bookmark URL:', url);

//     xhr.open('POST', url, true);
//     xhr.setRequestHeader('Content-Type', 'application/json');
//     xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

//     xhr.onreadystatechange = function () {
//       if (xhr.readyState === 4) {
//         if (xhr.status === 200) {
//           var response = JSON.parse(xhr.responseText);
//           console.log('Bookmark Response:', response);

//           var marksIcon = feedElement.querySelector('.marks-icon');
//           if (marksIcon) {
//             marksIcon.classList.toggle('booked');
//           }
//         } else {
//           console.error('Error bookmarking:', xhr.responseText);
//         }
//       }
//     };

//     xhr.send(JSON.stringify({ task_id: taskId }));
//   }
// });
