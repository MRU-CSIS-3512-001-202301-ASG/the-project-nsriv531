const countryDiv = document.getElementById("countrydiv");

fetch('http://127.0.0.1:8080/api/getcountries.php')
    .then(response => {
        return response.json();
    })
    .then(data => {

        const country = data.countries.map(countries => countries.CountryName);

        for (const countryItem of country) {
            const countryElement = document.createElement("p");
            countryElement.textContent = countryItem;
            countryDiv.appendChild(countryElement);
            countryElement.addEventListener("click", function () {

                countryElement.classList.add("clicked");


            });
        }
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });