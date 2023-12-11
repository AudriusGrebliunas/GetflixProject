import React, { useEffect, useState } from 'react';
import { getMovieInfo, getRandomMovies } from './Compenant/api';
import Navbar from './Compenant/navbar';  

function Wishlist() {
  const [movies, setMovies] = useState([]);
  const [selectedMovie, setSelectedMovie] = useState(null);

  useEffect(() => {
    const fetchRandomMovies = async () => {
      const randomMovies = await getRandomMovies(6);
      setMovies(randomMovies);
    };

    fetchRandomMovies();
  }, []);

  const handleMovieClick = async (movieId) => {
    const movieDetails = await getMovieInfo(movieId);
    setSelectedMovie(movieDetails);
  };
  useEffect(() => {
    // Ajoutez une classe au body lorsque le film est sélectionné
    if (selectedMovie) {
      document.body.classList.add('no-scroll');
    } else {
      document.body.classList.remove('no-scroll');
    }

    // Nettoyez l'effet lorsque le composant est démonté
    return () => {
      document.body.classList.remove('no-scroll');
    };
  }, [selectedMovie]);

  const renderMovies = () => {
    return movies.map((movie, index) => (
      <div key={index} className="px-2 mt-4" onClick={() => handleMovieClick(movie.id)}>
        <div className="bg-gray-300 h-24 w-48 relative">
          <img
            src={`https://image.tmdb.org/t/p/w300${movie.poster_path}`}
            alt={movie.title}
            className="w-full h-full object-cover cursor-pointer"
          />
          <div className="absolute inset-0 flex flex-col justify-end items-left opacity-0 hover:opacity-100 transition-opacity duration-300 text-left">
            <h3 className="text-lg font-semibold text-white">{movie.title}</h3>
          </div>
        </div>
      </div>
    ));
  };

  return (
    
    <div>
      <div className=" bg-cover bg-center h-screen" style={{ backgroundImage: selectedMovie ? `url('https://image.tmdb.org/t/p/original${selectedMovie.backdrop_path}')` : "url('https://placehold.co/1920x1080')"}}>
      <Navbar />
        <div className="bg-gray-800 bg-opacity-0 h-screen flex flex-col items-center item-left">
          {selectedMovie ? (
            <div className="bg-white opacity-20 p-4 rounded-lg shadow-md mb-4 max-w h-auto item-left">
              <h2 className="text-gray-800 text-4xl font-bold mb-4">{selectedMovie.title}</h2>
              <p className="text-yellow-400">
                <i className="fas fa-star"></i>
                <i className="fas fa-star"></i>
                <i className="fas fa-star"></i>
                <i className="fas fa-star"></i>
                <i className="fas fa-star"></i>
              </p>
              <p className="text-gray-800 mb-4">{selectedMovie.overview}</p>
              
            </div>
          ) : null}
        <div className="flex mb-4 justify-center fixed bottom-0">
            {renderMovies()}
          </div>
        </div>
      </div>
    </div>
  );
}

export default Wishlist;
