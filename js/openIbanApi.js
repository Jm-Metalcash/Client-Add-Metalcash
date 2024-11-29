document.addEventListener("DOMContentLoaded", () => {
    const ibanInput = document.getElementById("iban");
    const swiftInput = document.getElementById("swift");
    const banknameInput = document.getElementById("bankName");

    ibanInput.addEventListener("blur", () => {
        const iban = ibanInput.value.trim().replace(/\s+/g, "");
        if (iban === "") return;

        fetch(`https://openiban.com/validate/${iban}?getBIC=true&validateBankCode=true`)
            .then((response) => response.json())
            .then((data) => {
                if (data.valid) {
                    swiftInput.value = data.bankData.bic || "Non disponible";
                    banknameInput.value = data.bankData.name || "Non disponible";
                } else {
                    swiftInput.value = "";
                    banknameInput.value = "";
                }
            })
            .catch((error) => {
                console.error("Erreur lors de l'appel à l'API openiban :", error);
            });
    });
});
