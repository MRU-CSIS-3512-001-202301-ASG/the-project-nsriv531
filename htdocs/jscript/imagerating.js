export function findImageRating(imageid, $divid) {
    console.log("the id is"+$divid);
    fetch(`http://127.0.0.1:8080/api/imageratingcounter.php?imageid=${imageid}`)
        .then(response => {
            console.log("resp", response);
            return response.json();
        })
        .then(data => {
            
            const totalCount1 = data.total_count1;
            const totalCount2 = data.total_count2;
            const totalCount3 = data.total_count3;
            const totalCount4 = data.total_count4;
            const totalCount5 = data.total_count5;

            const thedivForImage = document.querySelector("#"+$divid);
            const ratingElement1 = document.createElement("p");
            const ratingElement2 = document.createElement("p");
            const ratingElement3 = document.createElement("p");
            const ratingElement4 = document.createElement("p");
            const ratingElement5 = document.createElement("p");

            if (totalCount1 == undefined){
                ratingElement1.textContent = "There are no one star ratings!";
                thedivForImage.appendChild(ratingElement1);
            }
            else if (totalCount1 == 1){

                ratingElement1.textContent = "There is one one star rating!";
            thedivForImage.appendChild(ratingElement1);
            }
            else {
                ratingElement1.textContent = "There are "+totalCount1+" one star ratings!";
            thedivForImage.appendChild(ratingElement1);
            }

            if (totalCount2 == undefined){
                ratingElement2.textContent = "There are no two star ratings!";
                thedivForImage.appendChild(ratingElement2);
            }
            else if (totalCount2 == 1){

                ratingElement1.textContent = "There is one two star rating!";
                thedivForImage.appendChild(ratingElement2);
            
            }
            else {
            
                ratingElement2.textContent = "There are "+totalCount2+" two star ratings!";
                thedivForImage.appendChild(ratingElement2);
            
            }
            if (totalCount3 == undefined){

                ratingElement3.textContent = "There are no three star ratings!";
                thedivForImage.appendChild(ratingElement3);
            }
            else if (totalCount3 == 1){

                ratingElement3.textContent = "There is one three star rating!";
                thedivForImage.appendChild(ratingElement3);
            }
            else {
                
                ratingElement3.textContent = "There are "+totalCount3+" three star ratings!";
                thedivForImage.appendChild(ratingElement3);
            }

            if (totalCount4 == undefined){

                ratingElement4.textContent = "There are no four star ratings!";
                thedivForImage.appendChild(ratingElement4);
            }
            else if (totalCount4 == 1){

                ratingElement4.textContent = "There is one four star rating!";
                thedivForImage.appendChild(ratingElement4);
            }
            else {
                ratingElement4.textContent = "There are "+totalCount4+" four star ratings!";
            thedivForImage.appendChild(ratingElement4);
            }

            if (totalCount5 == undefined){
                
                ratingElement5.textContent = "There are no five star ratings!";
                thedivForImage.appendChild(ratingElement5);
            }
            else if (totalCount5 == 1){

                ratingElement5.textContent = "There is one five star rating!";
                thedivForImage.appendChild(ratingElement5);
            }
            else {
                ratingElement5.textContent = "There are "+totalCount5+" five star ratings!";
                thedivForImage.appendChild(ratingElement5);
            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}