function salva_nota() {
    var noteInput = document.getElementById("noteInput");
    var noteText = noteInput.value.trim();

    if (noteText === "") {
        alert("Per favore, inserisci del testo per l'appunto.");
        return;
    }

    if (noteText !== '') {
        // Invia il contenuto della nota al server tramite PHP
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    location.reload()
                } else {
                    // In caso di errore
                    console.error('Errore durante l\'aggiunta dell\'elemento');
                }
            }
        };
        xhr.open('POST', '../Controller/salva_note.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); //dati codificati in formato uri
        xhr.send('contenuto=' + encodeURIComponent(noteText));
    } else {
        alert("Per favore, inserisci del testo per la nota.");
    }
}

function annulla_nota(element) {
    if (confirm("Sei sicuro di voler annullare le modifiche apportate?")) {
        location.reload();
    }
}

window.addEventListener("load", () => {
    // Ottieni riferimenti agli elementi del DOM
    const btnAggiungiElemento = document.getElementById('titolo');
    const btnConfermaAggiunta = document.getElementById('confermaModifica');
    const dialog = document.getElementById('dialog');
    const titoloElemento = document.getElementById('titoloElemento');
    
    btnAggiungiElemento.addEventListener('click', () => {
        dialog.style.display = 'block'; // Mostra la finestra di dialogo
    });

    btnConfermaAggiunta.addEventListener('click', () => {
        const titolo = titoloElemento.value;
        if (titolo.trim() !== '') {
            // Invia il titolo al server tramite PHP
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        location.reload()
                    } else {
                        // In caso di errore
                        console.error('Errore durante l\'aggiunta dell\'elemento');
                    }
                    // Chiudi la finestra di dialogo
                    dialog.style.display = 'none';
                    // Resetta il campo di input
                    titoloElemento.value = '';
                }
            };
            xhr.open('POST', '../Controller/aggiorna_titolo_nota.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); //dati codificati in formato uri
            xhr.send('titolo=' + encodeURIComponent(titolo));
        } else {
            alert('Inserisci un titolo valido');
        }
    });
});

function chiudiDialog() {
    document.getElementById('dialog').style.display = 'none';
};