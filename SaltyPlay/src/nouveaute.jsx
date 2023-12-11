// nouveaute.jsx
import React from 'react';
import ReactDOM from 'react-dom';

function Nouveaute() {
    const movieImages = Array.from({ length: 6 }, (_, index) => `https://placehold.co/600x400?text=Movie+${index + 1}`);

    return (
        <div className="p-6">
            <div className="grid grid-cols-3 gap-6">
                {movieImages.map((src, index) => (
                    <div key={index} className="bg-gray-800 rounded-lg overflow-hidden">
                        <img src={src} alt={`Placeholder image for movie ${index + 1}`} className="w-full h-auto" />
                    </div>
                ))}
            </div>
        </div>
    );
}

export default Nouveaute
