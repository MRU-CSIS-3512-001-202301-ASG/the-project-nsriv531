import { setImageSource } from './images.js';
import {getCity} from './cities.js';
import {getCountryInfo} from './countryinfo.js';
import { fillerDiv } from './fillerDiv.js';
import { singleDiv } from './singleDiv.js';
const filler = new fillerDiv();
const thesingle = new singleDiv();

const countryDiv = document.getElementById("countrydiv");


fetch('http://127.0.0.1:8080/api/getcountries.php')
    .then(response => {
        return response.json();
    })
    .then(data => {
        console.log("data from getCountries", data);
        const country = data.countries.map(countries => countries.CountryName);
        const isograbber = data.countries.map(countries => countries.ISO);

        for (const [index, countryItem] of country.entries()) {
            const countryISO = isograbber[index];
            const countryElement = document.createElement("p");
            countryElement.textContent = countryItem;
            countryElement.id = countryISO;
            countryDiv.appendChild(countryElement);
            countryElement.addEventListener("click", function () {
                filler.show();
                thesingle.hide();
                getCity(countryElement.id);
                getCountryInfo(countryElement.id);
                setImageSource(countryElement.id);

            });
        }
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });