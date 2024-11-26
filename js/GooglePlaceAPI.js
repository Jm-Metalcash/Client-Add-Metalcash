function initAutocomplete() {
    // Créer l'objet autocomplete pour l'input "address"
    const autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('address'),
        {
            types: ['address'],
        }
    );

    // Écouteur pour détecter les changements de sélection
    autocomplete.addListener('place_changed', () => {
        const place = autocomplete.getPlace();

        // Récupérer les composants de l'adresse
        const components = place.address_components;
        const localityInput = document.getElementById('locality');
        const countryInput = document.getElementById('country');
        const addressInput = document.getElementById('address');

        // Réinitialiser les valeurs
        localityInput.value = '';
        countryInput.value = '';
        addressInput.value = '';

        if (components) {
            let streetNumber = '';
            let route = '';
            let postalCode = '';
            let locality = '';
            let country = '';

            // Extrait les informations et les place dans les components (inputs)
            for (const component of components) {
                const types = component.types;

                if (types.includes('street_number')) {
                    streetNumber = component.long_name;
                }
                if (types.includes('route')) {
                    route = component.long_name;
                }
                if (types.includes('postal_code')) {
                    postalCode = component.long_name;
                }
                if (types.includes('locality')) {
                    locality = component.long_name;
                }
                if (types.includes('country')) {
                    country = component.long_name;
                }
            }

            // Mettre à jour les champs avec les informations formatées
            addressInput.value = `${route} ${streetNumber}`.trim(); // Rue et numéro
            localityInput.value = `${postalCode} ${locality}`.trim(); // Code postal et localité
            countryInput.value = country; // Nom du pays
        }
    });
}

// Assurez-vous que la fonction est dans le contexte global
window.initAutocomplete = initAutocomplete;
