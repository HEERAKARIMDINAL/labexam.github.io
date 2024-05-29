document.addEventListener('DOMContentLoaded', () => {
    const apiKey = '2daebaae3dfd436eac535c6312c3a838';
    const apiUrl = `https://newsapi.org/v2/top-headlines?country=us&apiKey=${apiKey}`;

    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            const postsContainer = document.getElementById('posts');
            data.articles.forEach(article => {
                const postElement = document.createElement('div');
                postElement.className = 'post';
                postElement.innerHTML = `
                    <img src="${article.urlToImage}" alt="${article.title}">
                    <h3>${article.title}</h3>
                    <p>${article.description}</p>
                    <a href="${article.url}" target="_blank">Read More</a>
                `;
                postsContainer.appendChild(postElement);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
});
