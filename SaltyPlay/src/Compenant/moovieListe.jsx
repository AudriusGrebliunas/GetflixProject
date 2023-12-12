// MovieList.jsx
import React, { useState, useEffect } from 'react';
import MovieCard from './MovieCard';
import { getRandomMovies } from './api';

const MovieList = () => {
  const [randomMovies, setRandomMovies] = useState([]);

  useEffect(() => {
    const fetchRandomMovies = async () => {
      const movies = await getRandomMovies(3);
      setRandomMovies(movies);
    };

    fetchRandomMovies();
  }, []);

  return (
    <div className="flex space-x-4">
      {randomMovies.map((movie) => (
        <MovieCard key={movie.id} movie={movie} />
      ))}
    </div>
  );
};

export default MovieList;
