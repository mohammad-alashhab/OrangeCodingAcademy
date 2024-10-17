// Function to fetch Pokémon details based on the ID from the URL
async function fetchPokemonDetails() {
    const urlParams = new URLSearchParams(window.location.search);
    const pokemonId = urlParams.get('id'); // Get the 'id' from the query parameter

    if (!pokemonId) {
        console.error('Pokémon ID not found in URL');
        return;
    }

    try {
        // Fetch details for the specific Pokémon ID
        let response = await fetch(`https://pokeapi.co/api/v2/pokemon/${pokemonId}`);
        let pokemonData = await response.json();

        // Display Pokémon details
        const pokemonDetails = document.getElementById('pokemonDetails');
        pokemonDetails.innerHTML = `
            <h2>#${pokemonData.id} ${pokemonData.name}</h2>
            <img src="${pokemonData.sprites.front_default}" alt="${pokemonData.name}">
            <p><strong>Height:</strong> ${pokemonData.height}</p>
            <p><strong>Weight:</strong> ${pokemonData.weight}</p>
            <p><strong>Base Experience:</strong> ${pokemonData.base_experience}</p>
            <p><strong>Abilities:</strong> ${pokemonData.abilities.map(ability => ability.ability.name).join(', ')}</p>
            <p><strong>Types:</strong> ${pokemonData.types.map(type => type.type.name).join(', ')}</p>
        `;
    } catch (error) {
        console.error('Error fetching Pokémon details:', error);
    }
}

// Call the function when the page loads
window.onload = fetchPokemonDetails;
