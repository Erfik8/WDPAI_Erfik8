function checkEnter(event) {
    if (event.key === 'Enter') {
        sendSearchRequest();
    }
}

function sendSearchRequest() {
    var userInput = document.getElementById('searchInput').value;
    var url = 'http://localhost:8080/getProducts?phrase=' + encodeURIComponent(userInput);

    // You can use fetch API to send the GET request
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            var parser = new DOMParser();
            // Parse the HTML string into a DOM Document
            var doc = parser.parseFromString(data, 'text/html');

            // Handle the response data as needed
            console.log(doc);

            document.getElementById('products-list').innerHTML = doc.getElementById('products-list').innerHTML;

            setupAsyncRequests()
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}

function sendGetProductRequest(destinationURI) {
    var url = destinationURI

    // You can use fetch API to send the GET request
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            var parser = new DOMParser();
            // Parse the HTML string into a DOM Document
            var doc = parser.parseFromString(data, 'text/html');

            // Handle the response data as needed
            console.log(doc);

            document.getElementById('product-description').innerHTML = doc.getElementById('product-description').innerHTML;

        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}

function setupAsyncRequests()
{
    var products_list = document.getElementById("products-list");
    var productLinks = products_list.getElementsByTagName('a');
         for (var i = 0; i < productLinks.length; i++) {
             productLinks[i].addEventListener('click', function(event) {
                 event.preventDefault();
                 var productId = this.getAttribute('href');
                 sendGetProductRequest(productId)
             });
         }
}

setupAsyncRequests()