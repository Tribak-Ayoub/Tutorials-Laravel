document.getElementById('fetch-html').addEventListener('click', () => {
    fetch('content.php')
        .then(response => response.text()) // Parse the response as text
        .then(html => {
            document.getElementById('content').innerHTML = html;
        })
        .catch(error => console.error('Error fetching HTML:', error));
});


document.getElementById('fetch-json').addEventListener('click', () => {
    fetch('data.php')
        .then(response => response.json()) // Parse the response as JSON
        .then(data => {
            let output = '<ul>';
            data.forEach(item => {
                output += `<li>${item.name} - ${item.age} years old</li>`;
            });
            output += '</ul>';
            document.getElementById('output').innerHTML = output;
        })
        .catch(error => console.error('Error fetching JSON:', error));
});