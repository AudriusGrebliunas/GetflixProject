import React, { useState, useEffect } from 'react';
import Navbar from './Compenant/navbar';
import { getMovieInfo, getRandomMovies } from './Compenant/api';
import Modal from './Compenant/Modal'; // Assurez-vous d'importer le composant Modal

export default function Categorie() {
  const [movies, setMovies] = useState([]);
  const [selectedMovie, setSelectedMovie] = useState(null);
  const [isFullScreen, setIsFullScreen] = useState(false);
  const [selectedCell, setSelectedCell] = useState(null);

  useEffect(() => {
    const fetchRandomMovies = async () => {
      const randomMovies = await getRandomMovies(6);
      setMovies(randomMovies);
    };

    fetchRandomMovies();
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
        key={movie.id}
        className={`bg-gray-900 h-32 cursor-pointer ${
          isFullScreen ? (index === selectedCell ? 'hidden' : 'col-span-1') : 'col-span-1'
        } ${index === selectedCell ? 'border-4 border-blue-500' : ''}`}
        onClick={() => handleCellClick(index)}
      ></div>
    ));
  };

  return (
    <div className='bg-gray-700'>
      <Navbar />
      <div className='w-full flex'>
        <div className='w-[20%] mt-[150px] flex flex-col gap-[20px] font-semibold text-lg'>
          <button value={28} onClick={() => handleMovieClick(28)}>Action</button>
          <button value={35} onClick={() => handleMovieClick(35)}>Comedy</button>
          <button value={16} onClick={() => handleMovieClick(16)}>Animation</button>
          <button value={53} onClick={() => handleMovieClick(53)}>Thriller</button>
          <button value={10749} onClick={() => handleMovieClick(10749)}>Romance</button>
        </div>

        <div className={`w-3/4 grid grid-cols-3 gap-4 p-4 ${isFullScreen ? 'grid-cols-1' : 'grid-cols-3'}`}>
          {Array.from({ length: 24 }).map((_, index) => (
            <div
              key={index}
              className={`bg-red-500 cursor-pointer ${isFullScreen ? (index === selectedCell ? 'absolute inset-0' : 'hidden') : 'col-span-1 h-32'} ${index === selectedCell ? 'border-4 border-blue-500' : ''}`}
              onClick={() => handleCellClick(index)}
            >
              {index === selectedCell && (
                <div className="bg-cover bg-center w-full h-full" style={{ backgroundImage: selectedMovie ? `url('https:image.tmdb.org/t/p/original${selectedMovie.backdrop_path}')` : "url('https:placehold.co/1920x1080')" }}>
                  <div className="bg-gray-800 bg-opacity-0 h-full flex flex-col items-center item-left">
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
              )}
            </div>
          ))}
        </div>
      </div>
      {selectedMovie && <Modal movie={selectedMovie} onClose={() => setIsFullScreen(false)} />}
    </div>
  );
}