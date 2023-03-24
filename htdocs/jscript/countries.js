import { setImageSource } from './images.js';
const countryDiv = document.getElementById("countrydiv");
const fillerDiv = document.getElementsByClassName("filler");

fetch('http://127.0.0.1:8080/api/getcountries.php')
    .then(response => {
        return response.json();
    })
    .then(data => {

        const country = data.countries.map(countries => countries.CountryName);
        const isograbber = data.countries.map(countries => countries.ISO);

        for (const [index, countryItem] of country.entries()) {
            const countryISO = isograbber[index];
            const countryElement = document.createElement("p");
            countryElement.textContent = countryItem;
            countryElement.id = countryISO;
            countryDiv.appendChild(countryElement);
            countryElement.addEventListener("click", function () {
                setImageSource(countryElement.id);
            });
        }
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });