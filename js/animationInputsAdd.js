document.addEventListener("DOMContentLoaded", () => {
    const inputs = document.querySelectorAll("input, select, textarea");

    // Ajouter les classes pour les animations
    inputs.forEach((input, index, inputArray) => {
        // Effet au focus
        input.addEventListener("focus", () => {
            input.classList.add("input-focused");
        });

        // Effet lorsqu'on quitte le champ
        input.addEventListener("blur", () => {
            input.classList.remove("input-focused");

            if (input.value.trim() !== "") {
                input.classList.add("input-filled");
            } else {
                input.classList.remove("input-filled");
            }
        });

        // Passer au champ suivant en appuyant sur "Enter"
        input.addEventListener("keydown", (e) => {
            if (e.key === "Enter") {
                e.preventDefault(); // Empêcher la soumission avec Enter
                const nextInput = inputArray[index + 1];
                if (nextInput) {
                    nextInput.focus(); // Passer au champ suivant
                }
            }
        });
    });
});
