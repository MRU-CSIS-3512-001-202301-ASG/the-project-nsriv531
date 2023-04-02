export function languagesParser(languageiso) {
    fetch(`http://127.0.0.1:8080/api/getlanguage.php?ISO=${languageiso}`)
      .then(response => {
        console.log("resp", response);
        return response.json();
      })
      .then(data => {
        console.log("data", data); // check the API response
        const languageName = data.language_name.map(language => language.name);
        console.log(languageName);
        const informationDiv = document.querySelector('.information');
        const LinformationElement = document.createElement("p");
        LinformationElement.textContent = "Language: "+languageName;
        console.log("test"+LinformationElement);
        informationDiv.append(LinformationElement);
      })
      .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
      });
  }
  