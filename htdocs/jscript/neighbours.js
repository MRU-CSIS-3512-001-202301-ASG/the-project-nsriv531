export function neighboringCountryParser(Neighboring) {
    fetch(`http://127.0.0.1:8080/api/getcountryname.php?countryISO=${Neighboring}`)
      .then(response => {
        console.log("resp", response);
        return response.json();
      })
      .then(data => {
        console.log("data", data); // check the API response
        const countryName = data.Country_Name.map(name => name.CountryName);
        console.log(countryName);
        const informationDiv = document.querySelector('.information');
        const informationElement = document.createElement("p");
        informationElement.textContent = "Neighboring Countries: "+countryName;
        console.log("test"+informationElement);
        informationDiv.append(informationElement);

      })
      .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
      });
  }
  