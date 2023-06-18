const loginButton = document.getElementById('login-button');
const surveyButton = document.getElementById('btn-survey');
const popup = document.getElementById('survey-popup');
const closeIcon = popup.querySelector('.icon-close');
document.addEventListener('DOMContentLoaded', function() {
  
  var btnLoginPopup = document.querySelector('.btnlogin-popup');
  var wrapper = document.querySelector('.wrapper');
  var iconClose = document.querySelector('.icon-close');

  btnLoginPopup.addEventListener('click', function() {
    wrapper.classList.add('active-popup');
  });

  iconClose.addEventListener('click', function() {
    wrapper.classList.remove('active-popup');
  });
});

loginButton.addEventListener('click', () => {
  window.location.href = 'form.html';
});

surveyButton.addEventListener('click', () => {
  popup.classList.add('active');
});

closeIcon.addEventListener('click', () => {
  popup.classList.remove('active');
});

