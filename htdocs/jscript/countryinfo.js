export function getCountryInfo(countryISO) {
    fetch(`http://127.0.0.1:8080/api/getcountryinfo.php?countryISO=${countryISO}`)
        .then(response => {
            console.log("resp", response);
            return response.json();
        })
        .then(data => {
            const infoOnCountrySelected = data.Information.map(info => info.Area);    
            const informationDiv = document.querySelector('.information');
            const existingPElements = informationDiv.querySelectorAll('p');
            existingPElements.forEach(p => p.remove());

            infoOnCountrySelected.forEach(info => {
                const pathPara = document.createElement("p");
                pathPara.textContent = info;
                informationDiv.appendChild(pathPara);
            });
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}