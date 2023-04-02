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
      // Remove existing table elements from the div
      const existingTable = singleDiv.querySelector('table');
      if (existingTable) {
        singleDiv.removeChild(existingTable);
      }
      // Create new table element and set its attributes
      const table = document.createElement("table");
      table.style.margin = "auto"; // Set margin property to center the table
      const headerRow = document.createElement("tr");
      const ratingHeader = document.createElement("th");
      ratingHeader.textContent = "Rating";
      const firstNameHeader = document.createElement("th");
      firstNameHeader.textContent = "First Name";
      const lastNameHeader = document.createElement("th");
      lastNameHeader.textContent = "Last Name";
      headerRow.appendChild(ratingHeader);
      headerRow.appendChild(firstNameHeader);
      headerRow.appendChild(lastNameHeader);
      table.appendChild(headerRow);
      // Add table rows for each rating
      RatingImageSelected.forEach(ratinginfo => {
          const row = document.createElement("tr");
          const ratingData = document.createElement("td");
          ratingData.textContent = ratinginfo.Rating;
          const firstNameData = document.createElement("td");
          firstNameData.textContent = ratinginfo.FirstName;
          const lastNameData = document.createElement("td");
          lastNameData.textContent = ratinginfo.LastName;
          row.appendChild(ratingData);
          row.appendChild(firstNameData);
          row.appendChild(lastNameData);
          table.appendChild(row);
      });
      singleDiv.appendChild(table);
    })
    .catch(error => {
      console.error('There was a problem with the fetch operation:', error);
    });
}
