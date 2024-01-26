// You can keep your existing JavaScript code or use the updated one below

document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search-bar');
    const searchResults = document.getElementById('search-results');

    searchInput.addEventListener('input', function () {
        const query = searchInput.value.trim();

        if (query !== '') {
            // Make an AJAX request to your PHP script
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'search.php?query=' + encodeURIComponent(query), true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const results = JSON.parse(xhr.responseText);
                    displayResults(results);
                }
            };

            xhr.send();
        } else {
            // Clear the results if the search input is empty
            searchResults.innerHTML = '';
        }
    });

    function displayResults(results) {
        const searchResults = document.getElementById('search-results');
        searchResults.innerHTML = '';

        if (results.length > 0) {
            // Build and append the results to the searchResults element
            for (const result of results) {
                const resultItem = document.createElement('div');
                resultItem.innerHTML = `<p><strong>ID:</strong> ${result.id}</p>
                                        <p><strong>Name:</strong> ${result.name}</p>
                                        <p><strong>Scam ID:</strong> ${result.scamId}</p>
                                        <p><strong>Description:</strong> ${result.description}</p>
                                        <p><strong>How Performed:</strong> ${result.howPerformed}</p>
                                        <p><strong>Preventive Measure:</strong> ${result.preventiveMeasure}</p>
                                        <p><strong>Summary:</strong> ${result.summary}</p>
                                        <p><strong>Created At:</strong> ${result.created_at}</p>`;
                searchResults.appendChild(resultItem);
            }
        } else {
            // Display a message when no results are found
            const noResultsMessage = document.createElement('div');
            noResultsMessage.textContent = 'No results found';
            searchResults.appendChild(noResultsMessage);
        }
    }
});
