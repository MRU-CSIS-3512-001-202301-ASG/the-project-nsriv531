const countries = [];

fetch('api/getcountries.php', {
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
        // Extract the country names and create a new array
        const countries = data.map(country => country.CountryName);
        console.log(countries);
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });

var countryDiv = document.getElementById("countrydiv");

for (var i = 0; i < countries.length; i++) {

    var countryItem = document.createElement("p");
    countryItem.textContent = countries[i];

    countryDiv.appendChild(countryItem);
}
