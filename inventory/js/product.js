const modal = document.getElementById('modal');
const modalOverlay = document.querySelector('.modal-overlay');
const addProductBtn = document.getElementById('addProductBtn');

addProductBtn.addEventListener('click', function () {
    modal.style.display = 'block';
});

modalOverlay.addEventListener('click', function (event) {
    if (event.target === modalOverlay) {
        modal.style.display = 'none';
    }
});

const fileInput = document.getElementById('file');
const imagePreview = document.getElementById('imagePreview');

fileInput.addEventListener('change', function (event) {
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();

        reader.addEventListener('load', function () {
            const imageURL = reader.result;
            imagePreview.innerHTML = `<img src="${imageURL}" alt="Preview" style="max-width: 100%; max-height: 200px;">`;
        });

        reader.readAsDataURL(file);
    } else {
        imagePreview.innerHTML = '';
    }
});