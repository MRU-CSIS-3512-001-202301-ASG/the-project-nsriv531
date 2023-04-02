export function findImageInformation(imageid) {
    fetch(`http://127.0.0.1:8080/api/imageinformation.php?imageid=${imageid}`)
      .then(response => {
        console.log("resp", response);
        return response.json();
      })
      .then(data => {
        const infoOnImageSelected = data["Image_Information:"];
        const singleDiv = document.querySelector('.single');
        const existingPElements = singleDiv.querySelectorAll('p');
        existingPElements.forEach(p => p.remove());
        infoOnImageSelected.forEach(info => {
        const pathPara = document.createElement("p");
        pathPara.textContent = "City Name: "+ info.AsciiName+ ", Country Name: "+info.CountryName + ", Country Description: "+info.CountryDescription+ ", Title: "+ info.Title + ", Latitude: "+info.Latitude+", Longitude: "+info.Longitude+", Username: "+info.UserName;          
        singleDiv.appendChild(pathPara);
        });
      })
      .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
      });
  }
  