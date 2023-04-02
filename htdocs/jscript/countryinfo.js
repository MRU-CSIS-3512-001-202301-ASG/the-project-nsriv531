import {neighboringCountryParser} from './neighbours.js';
import {languagesParser} from './languages.js';
export function getCountryInfo(countryISO) {
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
          //const pathCountryNeighbors = document.createElement("p");
          //pathCountryNeighbors.textContent = "Neighboring Countries: "+neighboringCountryParser(info.Neighbours);
          informationDiv.appendChild(pathPara);
          informationDiv.appendChild(pathCountryDesc);
          let languageArray = info.Languages.split(",");
          const newLanguageArray = [];
          for (let a = 0; a < languageArray.length; a++){
            let newIndex = languageArray[a].substring(0, 2)
            newLanguageArray.push(newIndex);
          }
          const languages = document.createElement("p");
          languages.textContent = "Languages: ";
          informationDiv.append(languages);
          for (let h = 0; h < newLanguageArray.length; h++){
            languagesParser(newLanguageArray[h])          
          }
          //const NeighboringCountryInfo = document.createElement("p");
          //NeighboringCountryInfo.textContent="Neighboring Countries: ";
          //informationDiv.appendChild(NeighboringCountryInfo);
          let myArray = info.Neighbours.split(","); // Split the string at each comma and space
          for (let i = 0; i < myArray.length; i++) {
            myArray[i] = myArray[i].trim();
          }
          for (let p = 0; p < myArray.length; p++){
            neighboringCountryParser(myArray[p])          
          }
        });
      })
      .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
      });
  }
  