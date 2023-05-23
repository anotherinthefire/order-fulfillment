
var actionButtons = document.getElementsByClassName('action-button');

for (var i = 0; i < actionButtons.length; i++) {
  actionButtons[i].addEventListener('click', toggleMoreOptions);
}

function toggleMoreOptions() {
  var moreOptions = this.nextElementSibling;
  moreOptions.classList.toggle('show');
}