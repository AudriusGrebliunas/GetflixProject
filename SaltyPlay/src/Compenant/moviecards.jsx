// MovieCard.jsx
import React, { useState, useEffect } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import { getRandomMovies, getMovieInfo } from './api';

const MovieCard = () => {
  const [isExpanded, setIsExpanded] = useState(false);
  const [randomMovies, setRandomMovies] = useState([]);
  const [currentMovie, setCurrentMovie] = useState(null);

  useEffect(() => {
    const fetchRandomMovies = async () => {
      const movies = await getRandomMovies();
      setRandomMovies(movies);

      if (movies.length > 0) {
        setCurrentMovie(movies[0]);
      }
    };

    fetchRandomMovies();
  }, []);

  const handleImageClick = async () => {
    setIsExpanded(!isExpanded);

    if (!isExpanded && randomMovies.length > 1) {
      const remainingMovies = randomMovies.filter((movie) => movie !== currentMovie);
      const newRandomMovie =
        remainingMovies[Math.floor(Math.random() * remainingMovies.length)];
      setCurrentMovie(newRandomMovie);
    }
  };

  return (
    <motion.div
      className={`movie-card ${isExpanded ? 'h-140' : 'h-60'} overflow-hidden relative`}
      onClick={handleImageClick}
    >
      <motion.img
        src={`https://image.tmdb.org/t/p/w500${currentMovie?.poster_path || ''}`}
        alt={currentMovie?.title || ''}
        layoutId={`image-${currentMovie?.id || ''}`}
        className="w-auto h-auto object-cover rounded-xl"
      />

      <AnimatePresence>
        {isExpanded && (
          <motion.div
            className="details-wrapper absolute bottom-0 left-0 right-0 bg-white p-4"
            layoutId={`details-wrapper-${currentMovie?.id || ''}`}
          >
            <motion.div
              className="details"
              layoutId={`details-${currentMovie?.id || ''}`}
              initial={{ opacity: 0, scaleY: 0 }}
              animate={{ opacity: 1, scaleY: 1 }}
              exit={{ opacity: 0, scaleY: 0 }}
            >
              <h2 className="text-xl font-bold mb-2">{currentMovie?.title || ''}</h2>
              <p className="text-gray-700">{currentMovie?.overview || ''}</p>
              <p className="text-gray-700">Note : {currentMovie?.vote_average || ''}</p>
            </motion.div>
          </motion.div>
        )}
      </AnimatePresence>
    </motion.div>
  );
};

export default MovieCard;
