document.addEventListener('DOMContentLoaded', function () {
    fetch('./property.php')
      .then(response => response.json())
      .then(data => {
        const propertyList = document.getElementById('property-list');
        data.forEach(property => {
          const li = document.createElement('li');
          li.innerHTML = `
            <div class="property-card">
              <figure class="card-banner">
                <a href="#"><img src="${property.image}" alt="${property.name}"></a>
              </figure>
              <div class="card-content">
                <div class="card-price">
                  <strong>${property.price}</strong>
                </div>
                <h3 class="h3 card-title"><a href="#">${property.name}</a></h3>
                <ul class="card-meta-list">
                  <li><div class="meta-box"><ion-icon name="location-outline"></ion-icon><address>${property.location}</address></div></li>
                </ul>
              </div>
            </div>
          `;
          propertyList.appendChild(li);
        });
      })
      .catch(error => console.error('Error fetching properties:', error));
  });
  