export function setImageSource(countryISO) {
    fetch('http://127.0.0.1:8080/api/imagesfromcountries.php?ISO=', countryISO)
        .then(response => {
            return response.json();
        })
        .then(data => {
            const imagePaths = data.image.filter(image => image.CountryCodeISO === countryISO);
            const imageElement = document.createElement("div");
            imagePaths.forEach(imagePath => {
                const pathText = document.createTextNode(imagePath.Path);
                const pathPara = document.createElement("p");
                pathPara.appendChild(pathText);
                imageElement.appendChild(pathPara);
            });
            const fillerDiv = document.querySelector('.filler');
            fillerDiv.innerHTML = "";
            fillerDiv.appendChild(imageElement);
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}