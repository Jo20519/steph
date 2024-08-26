document.addEventListener('DOMContentLoaded', function() {
    // Handle click events on navigation links
    document.querySelectorAll('nav a').forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior

            let url = this.getAttribute('href'); // Get the URL from the link's href attribute

            fetch(url)
                .then(response => response.text())
                .then(html => {
                    document.querySelector('main').innerHTML = html; // Replace the content of <main> with the fetched HTML
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
