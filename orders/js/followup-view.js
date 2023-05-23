function submitCancelForm() {
    document.getElementById("cancelForm").submit();
}

function toggleNoteEditMode() {
    var noteContainer = document.getElementById("noteContainer");
    var noteButton = document.getElementById("noteButton");

    if (noteContainer.contentEditable === "true") {
        noteContainer.contentEditable = "false";
        noteButton.innerText = "Notes";
        var updatedNote = noteContainer.textContent;

        var formData = new FormData();
        formData.append('orderId', '<?php echo $orderId; ?>');
        formData.append('note', updatedNote);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'actions/save-note.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            }
        };
        xhr.send(formData);

    } else {
        noteContainer.contentEditable = "true";
        noteContainer.focus();
        noteButton.innerText = "Save";
    }
}