import React, { useState, useEffect } from 'react';
import Slider from 'react-slick';
import { getRandomMovies } from './Compenant/api';
import Navbar from './Compenant/navbar';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';

function Wishlist() {
  const [movies, setMovies] = useState([]);
  const [selectedMovie, setSelectedMovie] = useState(null);

  useEffect(() => {
    const fetchRandomMovies = async () => {
      const randomMovies = await getRandomMovies(18); // Total 18 movies for 3 sections
      setMovies(randomMovies);
    };

    fetchRandomMovies();
  }, []);

  const settings = {
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 6,
    slidesToScroll: 1,
  };

  return (
    <div className="bg-slate-800">
      <Navbar />

      {/* À regarder */}
    <div className='flex flex-col gap-6'>
      <div className="w-screen grid grid-cols-3 gap-4 p-4">
        <Slider {...settings}>
          {movies.slice(0, 6).map((movie, index) => (
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
          ))}
        </Slider>
      </div>

      {/* En cours */}
      <div className="w-screen grid grid-cols-3 gap-4 p-4">
        <Slider {...settings}>
          {movies.slice(6, 12).map((movie, index) => (
            <div key={index} className="px-2 mt-4" onClick={() => handleMovieClick(movie.id)}>
              {/* Movie component */}
            </div>
          ))}
        </Slider>
      </div>

      {/* Continuer à regarder */}
      <div className="w-screen grid grid-cols-3 gap-4 p-4">
        <Slider {...settings}>
          {movies.slice(12, 18).map((movie, index) => (
            <div key={index} className="px-2 mt-4" onClick={() => handleMovieClick(movie.id)}>
              {/* Movie component */}
            </div>
          ))}
        </Slider>
      </div>
    </div>
    </div>
  );
}

export default Wishlist;
