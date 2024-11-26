document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("clientForm");
    const globalError = document.getElementById("globalError");

    // Fonction pour afficher une erreur
    function showError(input, message) {
        clearError(input);
        const error = document.createElement("span");
        error.className = "error";
        error.textContent = message;
        input.parentNode.appendChild(error);
        input.classList.add("invalid");
    }

    // Fonction pour supprimer une erreur avec animation
    function clearError(input) {
        const error = input.parentNode.querySelector(".error");
        if (error) {
            error.style.animation = "fadeOut 0.3s forwards";
            setTimeout(() => error.remove(), 300); // Retirer l'erreur après l'animation
        }
        input.classList.remove("invalid");
    }


    // Fonction de validation pour chaque champ
    function validateInput(input) {
        const value = input.value.trim();
        const name = input.name;

        if (name === "companyvat" && value !== "" && !/^[A-Z]{2}[A-Z0-9]{2,12}$/.test(value)) {
            return "Veuillez entrer un numéro de TVA valide (exemple : BE0123456789).";
        }

        if (name === "docExp") {
            const today = new Date();
            const expDate = new Date(value);
            if (expDate < today) {
                return "La date d'expiration est dépassée, veuillez vérifier.";
            }
        }

        if (name === "birthDate") {
            const today = new Date();
            const expDate = new Date(value);
            if (expDate > today) {
                return "La date de naissance ne peut pas être supérieure à aujourd'hui.";
            }
        }

        if (name === "email" && value !== "" && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
            return "Veuillez renseigner une adresse e-mail valide.";
        }

        if (name === "phone" && value !== "" && !/^\+?[0-9\s]+$/.test(value)) {
            return "Veuillez renseigner un numéro de téléphone valide.";
        }

        if (name === "iban" && value !== "" && !/^[A-Z]{2}[0-9]{2}(?:[ ]?[0-9]{4}){3,7}(?:[ ]?[0-9]{1,4})?$/.test(value)) {
            return "Veuillez renseigner un IBAN valide.";
        }        

        if (name === "swift" && value !== "" && !/^[A-Z]{4}[ ]?[A-Z]{2}[ ]?[A-Z0-9]{2}([ ]?[A-Z0-9]{3})?$/.test(value)) {
            return "Veuillez renseigner un code SWIFT valide.";
        }        
        

        if (["entity", "docType", "docNumber", "docExp", "firstName", "familyName", "address", "locality", "country", "interest", "referer"].includes(name) && value === "") {
            return "Veuillez renseigner ce champ.";
        }

        return null; // Pas d'erreur
    }

    // Vérifie si le formulaire est globalement valide
    function checkGlobalErrors() {
        const invalidInputs = form.querySelectorAll(".invalid");
        if (invalidInputs.length > 0) {
            globalError.style.display = "block";
            globalError.style.animation = "fadeIn 0.5s forwards";
        } else {
            globalError.style.animation = "fadeOut 0.5s forwards";
            setTimeout(() => (globalError.style.display = "none"), 500);
        }
    }

    // Gérer l'événement de sortie de champ
    form.querySelectorAll("input, select").forEach((input) => {
        input.addEventListener("blur", () => {
            const errorMessage = validateInput(input);
            if (errorMessage) {
                showError(input, errorMessage);
            } else {
                clearError(input);
            }
            checkGlobalErrors(); // Vérifie les erreurs globales après validation de chaque champ
        });

        // Supprime l'erreur une fois corrigée
        input.addEventListener("input", () => {
            const errorMessage = validateInput(input);
            if (!errorMessage) {
                clearError(input);
            }
            checkGlobalErrors(); // Vérifie les erreurs globales après correction
        });
    });

    // Valider tous les champs lors de la soumission du formulaire
    form.addEventListener("submit", (e) => {
        let isValid = true;

        // Réinitialiser l'état du message global
        globalError.style.display = "none";

        // Valider chaque champ
        form.querySelectorAll("input, select").forEach((input) => {
            const errorMessage = validateInput(input);
            if (errorMessage) {
                showError(input, errorMessage);
                isValid = false;
            } else {
                clearError(input);
            }
        });

        // Bloquer la soumission si des erreurs sont présentes
        if (!isValid) {
            e.preventDefault(); // Empêcher la soumission
            globalError.style.display = "block";
            globalError.style.animation = "fadeIn 0.5s forwards";
        } else {
            globalError.style.animation = "fadeOut 0.5s forwards";
            setTimeout(() => (globalError.style.display = "none"), 500);
        }
    });
});
