export function setImageSource(countryISO) {
    fetch(`http://127.0.0.1:8080/api/imagesfromcountries.php?ISO=${countryISO}`)
        .then(response => {
            console.log("resp", response);
            return response.json();
        })
        .then(data => {
            const imagePaths = data.imagepath.map(image => image.Path);
            console.log(imagePaths);
            const fillerDiv = document.querySelector('.filler');

            const existingPElements = fillerDiv.querySelectorAll('p');
            existingPElements.forEach(p => p.remove());

            imagePaths.forEach(imagepath => {
                const pathPara = document.createElement("p");
                pathPara.textContent = imagepath;
                fillerDiv.appendChild(pathPara);
            });
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}
