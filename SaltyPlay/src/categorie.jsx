import React, { useState, useEffect } from 'react';
import Navbar from './Compenant/navbar';
import { getMoviesInfo } from './Compenant/api';

const CategoryPage = () => {
  const [movies, setMovies] = useState([]);
  const [selectedMovie, setSelectedMovie] = useState(null);
  const [isFullScreen, setIsFullScreen] = useState(false);
  const [selectedCell, setSelectedCell] = useState(null);

  useEffect(() => {
    const fetchMovies = async () => {
      try {
        const moviesInfo = await getMoviesInfo();
        setMovies(moviesInfo);
      } catch (error) {
        console.error('Erreur lors de la récupération des films :', error);
      }
    };

    fetchMovies();
  }, []);

  const handleMovieClick = async (movieId) => {
    try {
      const movieDetails = await getMovieInfo(movieId);
      setSelectedMovie(movieDetails);
      setIsFullScreen(true);
    } catch (error) {
      console.error('Erreur lors de la récupération des informations sur le film :', error);
    }
  };

  const handleCellClick = (index) => {
    if (index === selectedCell) {
      setSelectedCell(null);
      setIsFullScreen(false);
    } else {
      setSelectedCell(index);
      setIsFullScreen(true);
    }
  };

  const renderMovies = () => {
    return movies.map((movie, index) => (
      <div
        key={index}
        className={`bg-gray-900 h-32 cursor-pointer ${
          isFullScreen ? (index === selectedCell ? 'hidden' : 'col-span-1') : 'col-span-1'
        } ${index === selectedCell ? 'border-4 border-blue-500' : ''}`}
        onClick={() => handleCellClick(index)}
      >
        {/* Correction: Ajout d'une condition pour afficher l'image du film */}
        {movie.image && (
          <img
            src={movie.image}
            alt={movie.name}
            className="object-cover w-full h-full"
          />
        )}

        {index === selectedCell && (
          <div className="bg-cover bg-center w-full h-full" style={{ backgroundImage: selectedMovie ? `url('${selectedMovie.image}')` : "url('https://placehold.co/1920x1080')"}}>
            <div className="bg-gray-800 bg-opacity-50 h-full flex flex-col items-center item-left">
              {selectedMovie ? (
                <div className="bg-white opacity-80 p-4 rounded-lg shadow-md mb-4 max-w-md h-auto item-left">
                  <h2 className="text-gray-800 text-4xl font-bold mb-4">{selectedMovie.name}</h2>
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
        )}
      </div>
    ));
  };

  return (
    <div className="flex flex-col w-full h-full bg-slate-700">
      <Navbar />
      <div className="flex flex-row">
        <div className={`w-1/4 flex justify-center items-center ${isFullScreen ? 'hidden' : ''}`}>
          <ul className="space-y-4 text-xl">
            <li><button value={28} onClick={() => handleMovieClick(28)}>Action</button></li>
            <li><button value={35} onClick={() => handleMovieClick(35)}>Comedy</button></li>
            <li><button value={16} onClick={() => handleMovieClick(16)}>Animation</button></li>
            <li><button value={53} onClick={() => handleMovieClick(53)}>Thriller</button></li>
            <li><button value={10749} onClick={() => handleMovieClick(10749)}>Romance</button></li>
          </ul>
        </div>

        <div className={`w-3/4 grid grid-cols-3 gap-4 p-4 ${isFullScreen ? 'grid-cols-1' : 'grid-cols-3'}`}>
          {renderMovies()}
        </div>
      </div>
    </div>
  );
};

export default CategoryPage;
