import React, { useState, useEffect } from 'react';
import axios from 'axios';

const PropertyList = () => {
    const [properties, setProperties] = useState([]);

    useEffect(() => {
        axios.get('/api/properties')
            .then(response => {
                setProperties(response.data);
            })
            .catch(error => {
                console.error('Error fetching properties:', error);
            });
    }, []);

    return (
        <div>
            <h1>Properties</h1>
            {properties.map(property => (
                <div key={property._id}>
                    <h2>{property.title}</h2>
                    <p>{property.description}</p>
                    <p>Location: {property.location}</p>
                    <p>Price: KES {property.price}</p>
                    <p>Size: {property.size}</p>
                    <p>Amenities: {property.amenities.join(', ')}</p>
                    <img src={property.images[0]} alt={property.title} style={{ width: '200px', height: '150px' }} />
                </div>
            ))}
        </div>
    );
};

export default PropertyList;
