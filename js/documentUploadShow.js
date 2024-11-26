document.addEventListener("DOMContentLoaded", () => {
    const rectoInput = document.getElementById("document_recto");
    const versoInput = document.getElementById("document_verso");
    const previewBoth = document.getElementById("previewBoth");
    const modal = document.getElementById("imageModal");
    const modalImage = document.getElementById("modalImage");
    const closeModal = document.querySelector(".modal .close");

    // Fonction pour afficher la prévisualisation d'une image
    function displayImagePreview(input, position) {
        const file = input.files[0];

        if (file) {
            if (!file.type.startsWith("image/")) {
                showError(input, "Seuls les fichiers image sont autorisés.");
                return;
            }

            const reader = new FileReader();

            reader.onload = (e) => {
                let img = previewBoth.querySelector(`img[data-position="${position}"]`);

                if (!img) {
                    img = document.createElement("img");
                    img.dataset.position = position;
                    img.addEventListener("click", () => {
                        showModal(e.target.result); // Afficher l'image dans le modal au clic
                    });
                    previewBoth.appendChild(img);
                }

                img.src = e.target.result;
                img.alt = `Prévisualisation du document ${position}`;
            };

            reader.readAsDataURL(file); // Lire le fichier pour la prévisualisation
        }
    }

    // Fonction pour afficher le modal
    function showModal(imageSrc) {
        modalImage.src = imageSrc;
        modal.style.display = "flex";
    }

    // Fonction pour fermer le modal
    function hideModal() {
        modal.style.display = "none";
        modalImage.src = ""; // Réinitialiser la source de l'image
    }

    closeModal.addEventListener("click", hideModal);

    // Fermer le modal en cliquant à l'extérieur
    modal.addEventListener("click", (e) => {
        if (e.target === modal) {
            hideModal();
        }
    });

    // Afficher la prévisualisation pour le recto
    rectoInput.addEventListener("change", () => {
        displayImagePreview(rectoInput, "recto");
    });

    // Afficher la prévisualisation pour le verso
    versoInput.addEventListener("change", () => {
        displayImagePreview(versoInput, "verso");
    });

    // Fonction pour afficher une erreur
    function showError(input, message) {
        const errorContainer = document.createElement("div");
        errorContainer.className = "error-message";
        errorContainer.textContent = message;
        input.parentNode.appendChild(errorContainer);

        setTimeout(() => errorContainer.remove(), 4000); // Supprimer après 4 secondes
    }
});
