export function neighboringCountryParser(Neighboring) {
    fetch(`http://127.0.0.1:8080/api/getcountryname.php?countryISO=${Neighboring}`)
      .then(response => {
        console.log("resp", response);
        return response.json();
      })
      .then(data => {
        console.log("data", data); // check the API response
        const country = data.CountryName.map(CountryName => CountryName.CountryName);
        console.log(country);
        return country.CountryName;
      })
      .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
      });
  }
  