export function getCityInfo(cityCode) {
  console.log(cityCode+"sdfsdf");
    fetch(`http://127.0.0.1:8080/api/getcityinfo.php?citycode=${cityCode}`)
      .then(response => {
        console.log("resp", response);
        return response.json();
      })
      .then(data => {
        console.log("data", data); // check the API response
        const infoOnCitySelected = data["Information"];
        console.log(infoOnCitySelected);
        const informationDiv = document.querySelector('.information');
        const existingPElements = informationDiv.querySelectorAll('p');
        existingPElements.forEach(p => p.remove());
        infoOnCitySelected.forEach(info => {
          const pathPara = document.createElement("p");
          pathPara.textContent = "City Name: "+ info.AsciiName+ ", Population: "+ info.Population + ", Elevation: "+info.Elevation+", Time Zone: "+info.TimeZone;          
          informationDiv.appendChild(pathPara);
        });
      })
      .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
      });
  }
  