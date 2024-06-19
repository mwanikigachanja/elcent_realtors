document.addEventListener('DOMContentLoaded', function () {
    fetch('./blog.php')
      .then(response => response.json())
      .then(data => {
        const blogList = document.getElementById('blog-list');
        data.forEach(blog => {
          const li = document.createElement('li');
          li.innerHTML = `
            <div class="blog-card">
              <figure class="card-banner">
                <a href="#"><img src="${blog.image}" alt="${blog.title}"></a>
              </figure>
              <div class="card-content">
                <h3 class="h3 card-title"><a href="#">${blog.title}</a></h3>
                <p class="card-snippet">${blog.snippet}</p>
                <time datetime="${blog.date}">${blog.date}</time>
              </div>
            </div>
          `;
          blogList.appendChild(li);
        });
      })
      .catch(error => console.error('Error fetching blogs:', error));
  });
  