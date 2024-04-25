function saveNote() {
    var noteInput = document.getElementById("noteInput");
    var noteText = noteInput.value.trim();

    if (noteText === "") {
        alert("Per favore, inserisci del testo per l'appunto.");
        return;
    }

    var noteList = document.getElementById("noteList");
    var noteElement = document.createElement("div");
    noteElement.className = "note";
    noteElement.innerHTML = noteText + '<button class="delete-btn" onclick="deleteNote(this)">Elimina</button>';
    document.body.appendChild(noteElement);
    noteInput.value = "";
}

function deleteNote(element) {
    if (confirm("Sei sicuro di voler eliminare questo appunto?")) {
        element.parentNode.remove();
    }
}