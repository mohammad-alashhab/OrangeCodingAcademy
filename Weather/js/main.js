
async function fetchWeatherData(city, unit = 'metric') {
    const weatherBox = document.getElementById('weatherBox');
    const unitSwitch = document.getElementById('unitSwitch');
    const apiKey = '02961efdb86812659c8a14482f79ff33';
    const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=${unit}`;

    try {
        const response = await fetch(apiUrl);
        if (!response.ok) {
            throw new Error('City not found');
        }
        const data = await response.json();

        const weatherDescription = data.weather[0].description;
        const temperature = data.main.temp;
        const tempMin = data.main.temp_min;
        const tempMax = data.main.temp_max;
        const humidity = data.main.humidity;
        const icon = data.weather[0].icon;
        const unitSymbol = unit === 'metric' ? '°C' : '°F';


        weatherBox.innerHTML = `
            <h2>Weather in ${data.name}</h2>
            <p><strong>Description:</strong> ${weatherDescription}</p>
            <p><strong>Temperature:</strong> ${temperature} ${unitSymbol}</p>
            <p><strong>Min:</strong> ${tempMin} ${unitSymbol} 	&nbsp; &nbsp; Max:</strong> ${tempMax} ${unitSymbol}</p>
            <p><strong>Humidity:</strong> ${humidity}%</p>
            <img src="https://openweathermap.org/img/w/${icon}.png" alt="Weather Icon">
        `;

        weatherBox.style.display = 'block';
        unitSwitch.style.display = 'block';
    } catch (error) {
        console.error('Error fetching weather data:', error);
        weatherBox.innerHTML = `<p>${error.message}</p>`;
        weatherBox.style.display = 'block';
    }
}


function performSearch() {
    const city = document.getElementById('cityInput').value;
    const unit = document.querySelector('input[name="unit"]:checked').value;

    if (city) {
        fetchWeatherData(city, unit);
    } else {
        alert('Please enter a city name.');
    }
}


document.getElementById('searchBtn').addEventListener('click', performSearch);


document.getElementById('cityInput').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        performSearch();
    }
});

document.querySelectorAll('input[name="unit"]').forEach((radio) => {
    radio.addEventListener('change', () => {
        const city = document.getElementById('cityInput').value;
        const unit = document.querySelector('input[name="unit"]:checked').value;
        if (city) {
            fetchWeatherData(city, unit);
        }
    });
});
