function showModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };
}

function redirectToColorView(size) {
    window.location.href = 'size-view.php?size=' + encodeURIComponent(size);
}