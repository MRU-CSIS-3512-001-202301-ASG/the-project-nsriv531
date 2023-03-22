const countryDiv = document.getElementById("countrydiv");

fetch('../api/getcountries.php', {
    headers: {
        'Accept': 'application/json'
    }
})
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (!Array.isArray(data)) {
            throw new Error('Invalid data format');
        }

        const country = data.country.map(countries => countries.CountryName);

        console.log(country);

        for (var i = 0; i < country.length; i++) {
            var countryItem = document.createElement("p");
            countryItem.textContent = country[i];
            countryDiv.appendChild(countryItem);
        }
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });