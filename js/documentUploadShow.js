document.addEventListener("DOMContentLoaded", () => {
    const rectoInput = document.getElementById("document_recto");
    const versoInput = document.getElementById("document_verso");
    const previewBoth = document.getElementById("previewBoth");
    const modal = document.getElementById("imageModal");
    const modalImage = document.getElementById("modalImage");
    const closeModal = document.querySelector(".modal .close");
  
    // Fonction pour afficher la prévisualisation d'une image (téléversement)
    function displayImagePreview(input, position) {
      const file = input.files[0];
  
      if (file) {
        if (!file.type.startsWith("image/")) {
          showError(input, "Seuls les fichiers image sont autorisés.");
          return;
        }
  
        const reader = new FileReader();
  
        reader.onload = (e) => {
          // Supprimer l'ancienne image et son conteneur s'il existe
          const oldContainer = previewBoth.querySelector(`.image-container[data-position="${position}"]`);
          if (oldContainer) {
            oldContainer.remove();
          }
  
          // Créer un conteneur pour l'image et le bouton de suppression
          const container = document.createElement("div");
          container.className = "image-container";
          container.dataset.position = position;
  
          const img = document.createElement("img");
          img.className = "preview-image";
          img.dataset.position = position;
          img.src = e.target.result;
          img.alt = `Prévisualisation du document ${position}`;
  
          // Ajouter l'écouteur de clic pour le modal
          img.addEventListener("click", () => {
            showModal(img.src); // Afficher l'image dans le modal au clic
          });
  
          // Ajouter le bouton de suppression
          const deleteButton = document.createElement("button");
          deleteButton.type = "button";
          deleteButton.className = "delete-image";
          deleteButton.dataset.position = position;
          deleteButton.innerHTML = "&times;";
  
          // Ajouter l'écouteur de clic pour la suppression
          deleteButton.addEventListener("click", (event) => {
            event.stopPropagation(); // Empêche le déclenchement de l'événement de clic sur l'image
            deleteImage(position, container);
          });
  
          // Assembler le conteneur
          container.appendChild(img);
          container.appendChild(deleteButton);
          previewBoth.appendChild(container);
        };
  
        reader.readAsDataURL(file); // Lire le fichier pour la prévisualisation
      }
    }
  
    // Fonction pour gérer les images existantes
    function enableClickOnExistingImages() {
      const existingContainers = previewBoth.querySelectorAll(".image-container");
      existingContainers.forEach((container) => {
        const img = container.querySelector("img.preview-image");
        const deleteButton = container.querySelector(".delete-image");
  
        // Ajouter l'écouteur de clic sur l'image pour le modal
        img.addEventListener("click", () => {
          showModal(img.src); // Afficher l'image existante dans le modal
        });
  
        // Ajouter l'écouteur de clic sur le bouton de suppression
        deleteButton.addEventListener("click", (e) => {
          e.stopPropagation(); // Empêche le déclenchement du clic sur l'image
          const position = deleteButton.getAttribute("data-position");
          deleteImage(position, container);
        });
      });
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
  
    // Ajouter des écouteurs d'événements si les champs existent
    if (rectoInput) {
      rectoInput.addEventListener("change", () => {
        displayImagePreview(rectoInput, "recto");
      });
    }
  
    if (versoInput) {
      versoInput.addEventListener("change", () => {
        displayImagePreview(versoInput, "verso");
      });
    }
  
    // Activer les clics sur les images existantes
    enableClickOnExistingImages();
  
    // Fonction pour afficher une erreur
    function showError(input, message) {
      const errorContainer = document.createElement("div");
      errorContainer.className = "error-message";
      errorContainer.textContent = message;
      input.parentNode.appendChild(errorContainer);
  
      setTimeout(() => errorContainer.remove(), 4000); // Supprimer après 4 secondes
    }
  
    // Fonction pour supprimer une image
    function deleteImage(position, container) {
      if (!confirm("Êtes-vous sûr de vouloir supprimer cette image ?")) return;
  
      if (clientId) {
        // Envoi de la requête AJAX pour supprimer l'image sur le serveur
        fetch("/Metalcash_clients_add/client/delete_documents_client.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-Token": csrfToken,
          },
          body: JSON.stringify({
            client_id: clientId,
            position: position,
          }),
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.success) {
              // Supprimer l'élément du DOM
              container.remove();
              alert("L'image a été supprimée avec succès.");
            } else {
              alert("Erreur : " + data.error);
            }
          })
          .catch((error) => {
            console.error("Erreur lors de la suppression de l'image:", error);
            alert("Une erreur est survenue lors de la suppression de l'image.");
          });
      } else {
        // Pas de clientId, le client n'est pas encore créé
        // Supprimer l'image du DOM et réinitialiser le champ input correspondant
        container.remove();
        if (position === "recto") {
          document.getElementById("document_recto").value = "";
        } else if (position === "verso") {
          document.getElementById("document_verso").value = "";
        }
        alert("L'image a été supprimée.");
      }
    }
  });
  