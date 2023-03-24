fetch ('http://127.0.0.1:8080/api/getimagesfromcountries.php')
    .then(response => {
    return response.json();
    })
    .then(data => {
   
})
.catch(error => {
    console.error('There was a problem with the fetch operation:', error);
});