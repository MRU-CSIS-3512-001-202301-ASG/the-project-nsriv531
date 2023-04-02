import {setCityImageSource} from './imagescities.js';
import {getCityInfo} from './citiesinfo.js';
import { fillerDiv } from './fillerDiv.js';
import { singleDiv } from './singleDiv.js';
const filler = new fillerDiv();
const single = new singleDiv();

export function getCity(countryISO) {
    fetch(`http://127.0.0.1:8080/api/getcities.php?countryISO=${countryISO}`)
        .then(response => {
            console.log("resp", response);
            return response.json();
        })
        .then(data => {
            const listOfCities = data.cities.map(city => city.AsciiName);
            const cityCodes = data.cities.map(city=>city.CityCode);
            const citiesDiv = document.querySelector('.cityList');
            console.log(listOfCities);
            const existingPElements = citiesDiv.querySelectorAll('p');
            existingPElements.forEach(p => p.remove());

            listOfCities.forEach((cities, index) => {
                const pathPara = document.createElement("p");
                pathPara.textContent = cities;
                pathPara.id = cityCodes[index];
                console.log("city id is"+pathPara.id);
                citiesDiv.appendChild(pathPara);
                pathPara.addEventListener("click", function () {
                    filler.show();
                    single.hide();
                    getCityInfo(pathPara.id);
                    setCityImageSource(pathPara.textContent);
    
                });
            });
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}