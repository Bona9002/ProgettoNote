function redirectToNote(id) {
    window.location.href = "note.php?id_raccoglitore=" + id;
};

window.addEventListener("load", () => {
    // Ottieni riferimenti agli elementi del DOM
    const btnAggiungiElemento = document.getElementById('aggiungiElemento');
    const btnConfermaAggiunta = document.getElementById('confermaAggiunta');
    const dialog = document.getElementById('dialog');
    const titoloElemento = document.getElementById('titoloElemento');

    // Gestisci il click sul pulsante "Aggiungi Elemento"
    btnAggiungiElemento.addEventListener('click', () => {
        dialog.style.display = 'block'; // Mostra la finestra di dialogo
    });

    // Gestisci il click sul pulsante "Aggiungi" nella finestra di dialogo
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
            xhr.open('POST', '../Controller/aggiungi_raccoglitore.php');
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