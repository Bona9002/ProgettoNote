function redirectToEditor(id) {
    window.location.href = "editor.php?id=" + id;
};

window.addEventListener("load", () => {
    // Ottieni riferimenti agli elementi del DOM
    const btnAggiungiElemento = document.getElementById('aggiungiElemento');
    const btnConfermaAggiunta = document.getElementById('confermaAggiunta');
    const dialog = document.getElementById('dialog');
    const titoloElemento = document.getElementById('titoloElemento');

    const btnAggiungiElemento_raccoglitore = document.getElementById('titolo');
    const btnConfermaAggiunta_raccoglitore = document.getElementById('confermaModifica-raccoglitore');
    const dialog_raccoglitore = document.getElementById('dialog-raccoglitore');
    const titoloElemento_raccoglitore = document.getElementById('titoloElemento-raccoglitore');

    btnAggiungiElemento.addEventListener('click', () => {
        dialog.style.display = 'block'; // Mostra la finestra di dialogo
    });

    btnAggiungiElemento_raccoglitore.addEventListener('click', () => {
        dialog_raccoglitore.style.display = 'block'; // Mostra la finestra di dialogo
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
                        alert('Errore durante l\'aggiunta dell\'elemento');
                    }
                    // Chiudi la finestra di dialogo
                    dialog.style.display = 'none';
                    // Resetta il campo di input
                    titoloElemento.value = '';
                }
            };
            xhr.open('POST', '../Controller/aggiungi_nota.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); //dati codificati in formato uri
            xhr.send('titolo=' + encodeURIComponent(titolo));
        } else {
            alert('Inserisci un titolo valido');
        }
    });

    btnConfermaAggiunta_raccoglitore.addEventListener('click', () => {
        const titolo = titoloElemento_raccoglitore.value;
        if (titolo.trim() !== '') {
            // Invia il titolo al server tramite PHP
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        location.reload()
                    } else {
                        // In caso di errore
                        alert('Errore durante l\'aggiunta dell\'elemento');
                    }
                    // Chiudi la finestra di dialogo
                    dialog_raccoglitore.style.display = 'none';
                    // Resetta il campo di input
                    titoloElemento_raccoglitore.value = '';
                }
            };
            xhr.open('POST', '../Controller/aggiorna_titolo_raccoglitore.php');
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

function chiudiDialog() {
    document.getElementById('dialog-raccoglitore').style.display = 'none';
};

function cancellaRaccoglitore() {
    if(confirm('Vuoi davvero cancellare il raccoglitore?')) {
        const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        //window.history.back();
                    } else {
                        console.error('Errore durante la cancellazione dell\'elemento');
                        alert('Errore durante la cancellazione dell\'elemento, assicurati che non ci siano note al suo interno');
                    }
                }
            };
            xhr.open('POST', '../Controller/cancella_raccoglitore.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); //dati codificati in formato uri
            xhr.send();
    }
}