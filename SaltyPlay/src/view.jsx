
import React, { useState } from 'react';
import Navbar from './Compenant/navbar'; 
export default function View() {
  const [selectedCell, setSelectedCell] = useState(null);
  const [movies, setMovies] = useState([]);
  const [selectedMovie, setSelectedMovie] = useState(null);
  const handleCellClick = (index) => {
    useEffect(() => {
      const fetchRandomMovies = async () => {
        const randomMovies = await getRandomMovies(6);
        setMovies(randomMovies);
      };
  
      fetchRandomMovies();
    }, []);
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
      )); };
    if (index === selectedCell) {
      setSelectedCell(null);
    } else {
    
      setSelectedCell(index);
    }
  };

  const isFullScreen = selectedCell !== null;

  return (
    <div className="bg-slate-800">
      <Navbar />
      <div className={`w-screen grid grid-cols-3 gap-4 p-4 ${isFullScreen ? 'grid-cols-1' : 'grid-cols-3'}`}>
        {Array.from({ length: 24 }).map((_, index) => (
          <div
            key={index}
            className={`bg-gray-700 cursor-pointer ${
              isFullScreen ? (index === selectedCell ? 'col-span-3 h-screen' : 'hidden') : 'col-span-1 h-32'
            } ${index === selectedCell ? 'border-4 border-blue-500' : ''}`}
            onClick={() => handleCellClick(index)}
          >
            {index === selectedCell && <div className=" bg-cover bg-center h-screen" style={{ backgroundImage: selectedMovie ? `url('https://image.tmdb.org/t/p/original${selectedMovie.backdrop_path}')` : "url('https://placehold.co/1920x1080')"}}>
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
      </div>}
          </div>
        ))}
      </div>
    </div>
  );
}