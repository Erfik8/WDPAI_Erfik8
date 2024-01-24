function checkEnter(event) {
    if (event.key === 'Enter') {
        sendSearchRequest();
    }
}

function sendSearchRequest() {
    var userInput = document.getElementById('searchInput').value;
    // Construct the new URL
    var newURL = 'http://localhost:8080/products?phrase=' + encodeURIComponent(userInput);
    // Redirect to the new page
    window.location.href = newURL;
}