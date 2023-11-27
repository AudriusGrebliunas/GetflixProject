import React, { useState } from "react";

const MovieGrid = ({ movies }) => {
  const [selectedMovie, setSelectedMovie] = useState(null);

  return (
    <div
      className="bg-cover"
      style={{ backgroundImage: `url(${selectedMovie?.backgroundImage})` }}
    >
      <div className="grid grid-cols-3 gap-4 p-4">
        {movies.map((movie, index) => (
          <div
            key={index}
            className="bg-gray-700 p-2 rounded"
            onClick={() => setSelectedMovie(movie)}
          >
            <img
              src={movie.image}
              alt={movie.title}
              className="w-full h-auto rounded"
            />
            {/* Other movie details */}
          </div>
        ))}
      </div>

      {selectedMovie && (
        <div className="absolute inset-0 bg-black bg-opacity-50 flex justify-center items-center">
          {/* Modal content for selected movie */}
          <div className="bg-white p-4 rounded">
            <h2>{selectedMovie.title}</h2>
            {/* Rating, summary, etc. */}
          </div>
        </div>
      )}
    </div>
  );
};
