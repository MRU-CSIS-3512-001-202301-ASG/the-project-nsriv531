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
        const theinformationElement = document.createElement("p");
        theinformationElement.textContent = "Neighboring Country: "+countryName;
        console.log("test"+theinformationElement);
        informationDiv.append(theinformationElement);

      })
      .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
      });
  }
  