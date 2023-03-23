const countryDiv = document.getElementById("countrydiv");

fetch('http://127.0.0.1:8080/api/getcountries.php')
    .then(response => {
        return response.json();
    })
    .then(data => {

        console.log(data)

        const country = data.countries.map(countries => countries.CountryName);

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