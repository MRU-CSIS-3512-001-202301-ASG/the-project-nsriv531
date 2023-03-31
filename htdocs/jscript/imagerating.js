export function findImageRating(imageid) {
    fetch(`http://127.0.0.1:8080/api/imageratingcounter.php?imageid=${imageid}`)
        .then(response => {
            console.log("resp", response);
            return response.json();
        })
        .then(data => {
            const imagePaths = data.imagepath.map(image => image.Path);
            const imageID = data.imagepath.map(image => image.ImageID)
            const fillerDiv = document.querySelector('.filler');
            const existingImgElements = fillerDiv.querySelectorAll('img');
            existingImgElements.forEach(img => img.remove());

            imagePaths.forEach(imagepath => {
                const pathPara = document.createElement("img");
                pathPara.id = imageID;
                pathPara.src = imageMaker(imagepath);
                fillerDiv.appendChild(pathPara);
                const ratingShowCase = document.createElement("p");
                ratingShowCase.textContent = 
            });
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}