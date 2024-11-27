document.addEventListener("DOMContentLoaded", () => {
    const addNoteButton = document.getElementById("add-note-button");
    const noteInput = document.getElementById("new-note");
    const notesList = document.getElementById("notes-list");

    // Sélectionner la ligne "Aucune note disponible" si elle existe
    let noNotesRow = document.getElementById("no-notes-row");

    // Fonction pour vérifier si le tableau est vide
    function checkIfNoNotes() {
        if (notesList.children.length === 0) {
            // Ajouter la ligne "Aucune note disponible"
            const row = document.createElement("tr");
            row.id = "no-notes-row";

            const cell = document.createElement("td");
            cell.colSpan = 3;
            cell.textContent = "Aucune note disponible pour ce client.";

            row.appendChild(cell);
            notesList.appendChild(row);

            noNotesRow = row; // Mettre à jour la référence
        }
    }

    // Fonction pour ajouter une nouvelle note dans le tableau
    function addNoteToTable(noteText, noteDate, noteId = null) {
        // Supprimer la ligne "Aucune note disponible" si elle existe
        if (noNotesRow) {
            noNotesRow.remove();
            noNotesRow = null;
        }

        const row = document.createElement("tr");

        // Colonne Date
        const dateCell = document.createElement("td");
        dateCell.textContent = noteDate;

        // Colonne Note
        const noteCell = document.createElement("td");
        noteCell.textContent = noteText;

        // Colonne Actions
        const actionCell = document.createElement("td");
        const deleteButton = document.createElement("button");
        deleteButton.textContent = "Supprimer";
        deleteButton.className = "delete-note";

        if (noteId !== null) {
            deleteButton.dataset.noteId = noteId;
        }

        // Attacher l'événement de suppression
        deleteButton.addEventListener("click", () => {
            if (noteId !== null) {
                // Envoyer une requête AJAX pour supprimer la note
                fetch("", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    body: `delete_note_id=${encodeURIComponent(noteId)}`,
                })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.success) {
                            row.remove(); // Supprimer la ligne du tableau
                            if (notesList.children.length === 0) {
                                checkIfNoNotes();
                            }
                        } else {
                            alert("Erreur lors de la suppression de la note.");
                        }
                    })
                    .catch(() => {
                        alert("Erreur réseau lors de la suppression de la note.");
                    });
            }
        });

        actionCell.appendChild(deleteButton);

        // Ajouter les cellules à la ligne
        row.appendChild(dateCell);
        row.appendChild(noteCell);
        row.appendChild(actionCell);

        // Ajouter la ligne au tableau
        notesList.appendChild(row);
    }

    // Ajouter une nouvelle note
    addNoteButton.addEventListener("click", () => {
        const noteText = noteInput.value.trim();
        if (!noteText) {
            alert("Veuillez entrer une note.");
            return;
        }

        // Envoyer une requête AJAX pour ajouter une nouvelle note
        fetch("", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: `new_note_text=${encodeURIComponent(noteText)}`,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    const noteDate = new Date(data.created_at).toLocaleDateString(); // Date créée par le serveur
                    addNoteToTable(noteText, noteDate, data.note_id); // Ajouter la note au tableau
                    noteInput.value = ""; // Réinitialiser le champ
                } else {
                    alert(data.error || "Erreur lors de l'ajout de la note.");
                }
            })
            .catch(() => {
                alert("Erreur réseau lors de l'ajout de la note.");
            });
    });

    // Attacher des écouteurs d'événements aux boutons "Supprimer" existants
    function attachDeleteEventListeners() {
        const deleteButtons = document.querySelectorAll(".delete-note");
        deleteButtons.forEach((button) => {
            const noteId = button.dataset.noteId;
            const row = button.closest("tr");

            button.addEventListener("click", () => {
                if (noteId) {
                    // Envoyer une requête AJAX pour supprimer la note
                    fetch("", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded",
                        },
                        body: `delete_note_id=${encodeURIComponent(noteId)}`,
                    })
                        .then((response) => response.json())
                        .then((data) => {
                            if (data.success) {
                                row.remove(); // Supprimer la ligne du tableau
                                if (notesList.children.length === 0) {
                                    checkIfNoNotes();
                                }
                            } else {
                                alert("Erreur lors de la suppression de la note.");
                            }
                        })
                        .catch(() => {
                            alert("Erreur réseau lors de la suppression de la note.");
                        });
                }
            });
        });
    }

    // Appeler la fonction pour attacher les événements aux boutons existants
    attachDeleteEventListeners();

    // Vérifier au chargement si le tableau est vide
    if (notesList.children.length === 0) {
        checkIfNoNotes();
    } else {
        // Vérifier si la ligne "Aucune note disponible" existe déjà
        noNotesRow = document.getElementById("no-notes-row");
    }
});
