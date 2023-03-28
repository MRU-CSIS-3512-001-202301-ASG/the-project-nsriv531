export function getCity(countryISO) {
    fetch(`http://127.0.0.1:8080/api/getcities.php?countryISO=${countryISO}`)
        .then(response => {
            console.log("resp", response);
            return response.json();
        })
        .then(data => {

            const listOfCities = data.cities.map(city => city.AsciiName);
            const citiesDiv = document.querySelector('.cityList');
            console.log(listOfCities);
            const existingPElements = citiesDiv.querySelectorAll('p');
            existingPElements.forEach(p => p.remove());

            listOfCities.forEach(cities => {
                const pathPara = document.createElement("p");
                pathPara.textContent = cities;
                citiesDiv.appendChild(pathPara);
            });
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}