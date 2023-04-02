import {findImageInformation} from "./imageinformation.js";
import {findImageRatingWithUsers} from './imageratingfromuser.js';
import {findImageRating} from "./imagerating.js";
import { fillerDiv } from './fillerDiv.js';
import { singleDiv } from './singleDiv.js';
const filler = new fillerDiv();
const single = new singleDiv();
export function setCityImageSource(cityName) {
    fetch(`http://127.0.0.1:8080/api/imagesfromcities.php?cityName=${cityName}`)
        .then(response => {
            console.log("resp", response);
            return response.json();
        })
        .then(data => {
            const imagePaths = data.imagepath.map(image => image.Path);
            const imageID = data.imagepath.map(image => image.ImageID);
            const fillerDiv = document.querySelector('.filler');
            const singleDiv = document.querySelector('.single');
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
                pathPara.addEventListener("click", function () {
                    fillerDiv.style.display = "none"; // add this line to toggle visibility off
                    const existingImgElement = singleDiv.querySelector('img');
                    const existingButtonElement = singleDiv.querySelector('button');
                    if (existingImgElement) {
                        existingImgElement.remove();
                      }
                      if (existingButtonElement) {
                        existingButtonElement.remove();
                      }
                    const copyImg = document.createElement("img");
                    copyImg.src = pathPara.src;
                    copyImg.id = pathPara.id;
                    singleDiv.appendChild(copyImg);
                    findImageInformation(copyImg.id);
                    findImageRatingWithUsers(copyImg.id);
                    const toggleButton = document.createElement("button");
                    toggleButton.textContent = "Back to Default View";
                    toggleButton.addEventListener("click", function() {
                        filler.show();
                        single.hide();
                    });
                    singleDiv.appendChild(toggleButton);    
                    single.show();
                });
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