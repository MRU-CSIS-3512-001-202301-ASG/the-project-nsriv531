const countries = ['Canada', 'United States', 'Jamaica'];

var countryDiv = document.getElementById("countrydiv");

for (var i = 0; i < countries.length; i++) {
    var countryItem = document.createElement("p");
    countryItem.textContent = countries[i];
    countryDiv.appendChild(countryItem);
}
