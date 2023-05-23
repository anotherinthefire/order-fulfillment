function showModal() {
  var modal = document.getElementById("myModal");
  modal.style.display = "block";
  window.addEventListener("click", function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  });
}

function addCategory() {
  var categoryInput = document.getElementById('categoryInput');
  var category = categoryInput.value.trim();

  if (category !== '') {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'actions/add-category.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        var response = xhr.responseText;
        if (response === 'success') {
          alert('Category added successfully');
          location.reload();
        } else if (response === 'exists') {
          alert('Category already exists');
        } else {
          alert('Error adding category');
        }
      }
    };
    xhr.send('category=' + encodeURIComponent(category));
  }
}