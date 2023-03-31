export function findImageRating(imageid) {
    console.log(imageid);
    fetch(`http://127.0.0.1:8080/api/imageratingcounter.php?imageid=${imageid}`)
        .then(response => {
            console.log("resp", response);
            return response.json();
        })
        .then(data => {
            const totalCount = data.total_count;
            const fillerDiv = document.querySelector('.filler');
            const ratingElement = document.createElement("p");
            if (totalCount == undefined){
                ratingElement.textContent = "There are no three star ratings!";
                fillerDiv.appendChild(ratingElement);
            }
            else {
            ratingElement.textContent = "There are "+totalCount+" three star ratings!";
            fillerDiv.appendChild(ratingElement);
            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}