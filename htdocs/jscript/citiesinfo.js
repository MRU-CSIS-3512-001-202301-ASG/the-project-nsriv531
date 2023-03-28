export function getCityInfo(countryISO) {
    fetch(`http://127.0.0.1:8080/api/getcountryinfo.php?countryISO=${countryISO}`)
      .then(response => {
        console.log("resp", response);
        return response.json();
      })
      .then(data => {
        console.log("data", data); // check the API response
        const infoOnCountrySelected = data["Information:"];
        console.log(infoOnCountrySelected);
        const informationDiv = document.querySelector('.information');
        const existingPElements = informationDiv.querySelectorAll('p');
        existingPElements.forEach(p => p.remove());
  
        infoOnCountrySelected.forEach(info => {
          const pathPara = document.createElement("p");
          pathPara.textContent = "Country Name: "+ info.CountryName+ ", Area: "+ info.Area + ", Population: "+info.Population+", Capital Name: "+info.Capital+", Currency: "+info.CurrencyName+", Top Level Domain: "+info.TopLevelDomain+", Languages: "+info.Languages+", Neighboring Countries: "+info.Neighbours;          
          const pathCountryDesc = document.createElement("p");
          pathCountryDesc.textContent = "Country Description: "+info.CountryDescription;
          informationDiv.appendChild(pathPara);
          informationDiv.appendChild(pathCountryDesc);

        });
      })
      .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
      });
  }
  