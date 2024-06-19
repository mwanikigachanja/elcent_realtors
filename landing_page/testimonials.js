document.addEventListener('DOMContentLoaded', function () {
    fetch('./testimonial.php')
      .then(response => response.json())
      .then(data => {
        const testimonialList = document.getElementById('testimonial-list');
        data.forEach(testimonial => {
          const li = document.createElement('li');
          li.innerHTML = `
            <div class="testimonial-card">
              <figure class="card-banner">
                <img src="${testimonial.image}" alt="${testimonial.name}">
              </figure>
              <div class="card-content">
                <h3 class="h3 card-title">${testimonial.name}</h3>
                <p class="card-text">${testimonial.feedback}</p>
              </div>
            </div>
          `;
          testimonialList.appendChild(li);
        });
      })
      .catch(error => console.error('Error fetching testimonials:', error));
  });
  