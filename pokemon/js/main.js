// Function to fetch Pokémon data in order by ID
async function fetchPokemonData() {
    const pokemonGrid = document.getElementById('pokemonGrid');
    const maxPokemonId = 51; // Number of Generation 1 Pokémon

    try {
        // Loop over each Pokémon ID from 1 to maxPokemonId
        for (let i = 1; i <= maxPokemonId; i++) {
            // Fetch data for each Pokémon by its ID
            let response = await fetch(`https://pokeapi.co/api/v2/pokemon/${i}`);
            let pokemonData = await response.json();

            // Create a div for each Pokémon with its name, image, and link
            const pokemonDiv = document.createElement('div');
            pokemonDiv.classList.add('pokemon-card');

            pokemonDiv.innerHTML = `
                <img src="${pokemonData.sprites.front_default}" alt="${pokemonData.name}">
                <p>#${pokemonData.id}</p>
                <p>
                    <a href="pokemon-details.html?id=${pokemonData.id}">
                        ${pokemonData.name}
                    </a>
                </p>
            `;

            // Append each Pokémon to the grid in order
            pokemonGrid.appendChild(pokemonDiv);
        }
    } catch (error) {
        console.error('Error fetching Pokémon data:', error);
    }
}

// Call the function when the page loads
window.onload = fetchPokemonData;
