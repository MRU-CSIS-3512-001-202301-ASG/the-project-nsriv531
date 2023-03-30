export function languagesParser(languageiso) {
    fetch(`http://127.0.0.1:8080/api/getlanguage.php?ISO=${languageiso}`)
      .then(response => {
        console.log("resp", response);
        return response.json();
      })
      .then(data => {
        console.log("data", data); // check the API response
        const languageName = data.language_name.map(language => language.name);
        const informationDiv = document.querySelector('.information');
        const informationElement = document.createElement("p");
        informationElement.textContent = languageName;
        console.log("test"+informationElement);
        informationDiv.append(informationElement);

      })
      .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
      });
  }
  