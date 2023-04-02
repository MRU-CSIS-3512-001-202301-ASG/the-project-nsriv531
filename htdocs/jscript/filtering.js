// Get the search boxes
const countrySearchBox = document.querySelector('#countrydiv input[type="search"]');
const citySearchBox = document.querySelector('.cityList input[type="search"]');
const countryDiv = document.querySelector('#countrydiv');
const cityDiv = document.querySelector('.cityList');

countrySearchBox.addEventListener('input', function() {
  filterCountries();
  citySearchBox.value = '';
});

citySearchBox.addEventListener('input', function() {
  filterCities();
  countrySearchBox.value = '';
});

function filterCountries() {
  const filter = countrySearchBox.value.toUpperCase();
  const pTags = countryDiv.querySelectorAll('p');

  pTags.forEach(pTag => {
    const countryName = pTag.textContent.toUpperCase();
    if (countryName.startsWith(filter)) {
      pTag.style.display = 'block';
    } else {
      pTag.style.display = 'none';
    }
  });
}

function filterCities() {
  const filter = citySearchBox.value.toUpperCase();
  const pTags = cityDiv.querySelectorAll('p');

  pTags.forEach(pTag => {
    const cityName = pTag.textContent.toUpperCase();
    if (cityName.startsWith(filter)) {
      pTag.style.display = 'block';
    } else {
      pTag.style.display = 'none';
    }
  });
}