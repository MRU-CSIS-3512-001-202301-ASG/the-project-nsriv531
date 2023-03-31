import {findImageRating} from "./imagerating.js";
export function setImageSource(countryISO) {
    fetch(`http://127.0.0.1:8080/api/imagesfromcountries.php?ISO=${countryISO}`)
        .then(response => {
            console.log("resp", response);
            return response.json();
        })
        .then(data => {

            const imagePaths = data.imagepath.map(image => image.Path);
            const imageID = data.imagepath.map(image => image.ImageID)
            const fillerDiv = document.querySelector('.filler');
            const existingImgElements = fillerDiv.querySelectorAll('img');
            const existingDivElements = fillerDiv.querySelectorAll('div');
            existingDivElements.forEach(div => div.remove());
            existingImgElements.forEach(img => img.remove());
            imagePaths.forEach((imagepath, index) => { // iterate over both arrays simultaneously using index
                const divForImage = document.createElement("div")
                const pathPara = document.createElement("img");
                divForImage.id = "a"+imageID[index];
                pathPara.id = imageID[index]; // set the id to the corresponding imageID at the same index
                pathPara.src = imageMaker(imagepath);
                divForImage.appendChild(pathPara);
                findImageRating(pathPara.id, divForImage.id);
                fillerDiv.appendChild(divForImage);
            });
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}

function imageMaker(theImage) {

    return `https://res.cloudinary.com/dlf6zmtga/image/upload/c_scale,w_300,h_300/v1673638741/${theImage}`;

}
