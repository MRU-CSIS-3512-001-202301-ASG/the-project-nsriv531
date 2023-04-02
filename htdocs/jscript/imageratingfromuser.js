export function findImageRatingWithUsers(imageid) {
    fetch(`http://127.0.0.1:8080/api/imageratingsingleview.php?imageid=${imageid}`)
      .then(response => {
        console.log("resp", response);
        return response.json();
      })
      .then(data => {
        console.log("ratingsss");
        const RatingImageSelected = data["Rating_Info:"];
        const singleDiv = document.querySelector('.single');
        RatingImageSelected.forEach(ratinginfo => {
        const ratingInfo = document.createElement("p");
        ratingInfo.textContent = "Rating: "+ ratinginfo.Rating+ ", First Name: "+ratinginfo.FirstName + ", Last Name: "+ratinginfo.LastName;          
        singleDiv.appendChild(ratingInfo);
        });
      })
      .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
      });
  }
  