// Get the search boxes
const countrySearchBox = document.querySelector('#countrydiv input[type="search"]');
const citySearchBox = document.querySelector('.cityList input[type="search"]');

// Get the divs that contain the information
const countryDiv = document.querySelector('#countrydiv');
const cityDiv = document.querySelector('.cityList');

// Listen for input events on the search boxes
countrySearchBox.addEventListener('input', filterCountries);
citySearchBox.addEventListener('input', filterCities);

// Function to filter the countries
function filterCountries() {
  const filter = countrySearchBox.value.toUpperCase();
  const pTags = countryDiv.querySelectorAll('p');
  
  for (let i = 0; i < pTags.length; i++) {
    const countryName = pTags[i].textContent.toUpperCase();
    if (countryName.includes(filter)) {
      pTags[i].style.display = 'block';
    } else {
      pTags[i].style.display = 'none';
    }
  }
}

// Function to filter the cities
function filterCities() {
  const filter = citySearchBox.value.toUpperCase();
  const pTags = cityDiv.querySelectorAll('p');
  
  for (let i = 0; i < pTags.length; i++) {
    const cityName = pTags[i].textContent.toUpperCase();
    if (cityName.includes(filter)) {
      pTags[i].style.display = 'block';
    } else {
      pTags[i].style.display = 'none';
    }
  }
}
