function showModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";

    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };
}

function addColor(event) {
    event.preventDefault()

    var colorInput = document.getElementById('colorInput');
    var color = colorInput.value.trim();

    if (color !== '') {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'actions/add-color.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var response = xhr.responseText;
                if (response === 'success') {
                    alert('Color added successfully');
                    location.reload();
                } else if (response === 'exists') {
                    alert('Color already exists');
                } else {
                    alert('Error adding color');
                }
            }
        };
        xhr.send('color=' + encodeURIComponent(color));
    }
}