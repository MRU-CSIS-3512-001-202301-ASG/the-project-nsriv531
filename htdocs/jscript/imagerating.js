export function findImageRating(imageid, $divid) {
    console.log("the id is"+$divid);
    fetch(`http://127.0.0.1:8080/api/imageratingcounter.php?imageid=${imageid}`)
        .then(response => {
            console.log("resp", response);
            return response.json();
        })
        .then(data => {
            const totalCount = data.total_count;
            console.log(totalCount)
            const thedivForImage = document.querySelector("#"+$divid);
            const ratingElement = document.createElement("p");
            if (totalCount == undefined){
                ratingElement.textContent = "There are no three star ratings!";
                thedivForImage.appendChild(ratingElement);
            }
            else if (totalCount == 1){

            ratingElement.textContent = "There is "+totalCount+" three star rating!";
            thedivForImage.appendChild(ratingElement);
            }
            else {
                
            ratingElement.textContent = "There are "+totalCount+" three star ratings!";
            thedivForImage.appendChild(ratingElement);
            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}