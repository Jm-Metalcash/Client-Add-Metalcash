document.addEventListener("DOMContentLoaded", () => {
    const addNoteButton = document.getElementById("add-note-button");
    const noteInput = document.getElementById("new-note");
    const notesList = document.getElementById("notes-list");
    const notesSection = document.querySelector(".notes-section");
    const formClient = document.getElementById("clientForm");

    let notes = []; // Tableau pour stocker les notes temporairement

    // Ajouter une nouvelle note
    addNoteButton.addEventListener("click", () => {
        const noteText = noteInput.value.trim();
        if (!noteText) {
            alert("Veuillez entrer une note."); // Remplacer par un système de message d'erreur si nécessaire
            return;
        }

        const noteId = Date.now(); // ID unique basé sur le timestamp
        const noteDate = new Date().toLocaleDateString(); // Affiche uniquement la date
        notes.push({ id: noteId, text: noteText, date: noteDate });

        renderNotes(); // Réafficher les notes
        noteInput.value = ""; // Réinitialiser le champ
    });

    // Afficher les notes dans la liste
    function renderNotes() {
        notesList.innerHTML = "";

        if (notes.length === 0) {
            notesSection.style.display = "none"; // Masquer la section si aucune note
        } else {
            notesSection.style.display = "block"; // Afficher la section si des notes sont présentes

            notes.forEach((note) => {
                const row = document.createElement("tr");
                row.dataset.id = note.id;

                // Colonne de la date
                const dateCell = document.createElement("td");
                dateCell.textContent = note.date;
                dateCell.className = "date-cell";

                // Colonne de la note
                const noteCell = document.createElement("td");
                noteCell.className = "note-cell";
                noteCell.textContent = note.text;
                noteCell.addEventListener("click", () => editNote(noteCell, note.id));

                // Colonne des actions
                const actionCell = document.createElement("td");
                const deleteButton = document.createElement("button");
                deleteButton.textContent = "Supprimer";
                deleteButton.className = "delete-button";
                deleteButton.addEventListener("click", () => {
                    deleteNote(note.id);
                });
                actionCell.appendChild(deleteButton);

                // Ajout des colonnes à la ligne
                row.appendChild(dateCell);
                row.appendChild(noteCell);
                row.appendChild(actionCell);

                // Ajout de la ligne au tableau
                notesList.appendChild(row);
            });
        }
    }

    // Permettre l'édition de la note
    function editNote(noteCell, noteId) {
        const currentText = noteCell.textContent;
        const input = document.createElement("input");
        input.type = "text";
        input.value = currentText;
        input.className = "edit-input";

        // Sauvegarder la modification lorsqu'on quitte le champ
        input.addEventListener("blur", () => {
            const newText = input.value.trim();
            noteCell.textContent = newText || currentText; // Revenir à l'ancien texte si le nouveau est vide
            updateNote(noteId, newText || currentText); // Mettre à jour la note
        });

        // Sauvegarder avec la touche Entrée
        input.addEventListener("keydown", (e) => {
            if (e.key === "Enter") {
                input.blur();
            }
        });

        // Remplacer le texte par l'input
        noteCell.textContent = "";
        noteCell.appendChild(input);
        input.focus();
    }

    // Mettre à jour la note dans le tableau
    function updateNote(id, newText) {
        const noteIndex = notes.findIndex((note) => note.id === id);
        if (noteIndex !== -1) {
            notes[noteIndex].text = newText;
        }
    }

    // Supprimer une note
    function deleteNote(id) {
        notes = notes.filter((note) => note.id !== id);
        renderNotes();
    }

    // Soumission du formulaire avec les notes
    formClient.addEventListener("submit", () => {
        const notesHidden = document.getElementById("notes-hidden");
        notesHidden.value = JSON.stringify(notes); // Convertir les notes en JSON
    });

    // Initialiser la visibilité des notes
    renderNotes(); // Vérifie si la section des notes doit être affichée ou masquée au chargement
});