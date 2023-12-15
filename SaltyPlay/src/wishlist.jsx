
import React, { useState, useEffect } from 'react';
import Slider from 'react-slick';
import { getRandomMovies } from './Compenant/api';
import Navbar from './Compenant/navbar';
import Modal from './Compenant/Modal'; 
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
import { getMoviesInfo } from './Compenant/api';

export default function Wishlist() {
  const settings = {
    dots: false,
    infinite: true,
    speed: 500,
    slidesToShow: 5,
    slidesToScroll: 1,
  };

  const [movies, setMovies] = useState([]);
  const [selectedMovie, setSelectedMovie] = useState(null);

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

  const handleMovieClick = (movieId) => {
    const selectedMovie = movies.find((movie) => movie.id === movieId);
    setSelectedMovie(selectedMovie);
  };

  const handleCloseModal = () => {
    setSelectedMovie(null);
  };
  const section1 = movies.slice(0, 7);
  const section2 = movies.slice(7, 14);
  const section3 = movies.slice(14, 21);
  const section4 = movies.slice(21, 28);

  return (
    <div className='bg-gray-800'>
      <div className='mb-[100px]'>
        <Navbar />
      </div>

      <div className='mx-[50px] mt-[80px] pb-[80px]'>
        <div className='ml-2 mb-3 text-xl font-semibold text-white'>
          Les préférés des Utilisateurs
        </div>
        <Slider {...settings}>
          {section1.map((movie, index) => (
            <div key={index} onClick={() => handleMovieClick(movie.id)}>
              <div className='h-[400px] mx-1'>
                <div className='h-full w-full'>
                  <img
                    src={`https://image.tmdb.org/t/p/w300${movie.image}`}
                    alt={movie.name}
                    className='w-full h-full object-cover cursor-pointer rounded-xl'
                  />
                </div>
              </div>
            </div>
          ))}
        </Slider>
      </div>

      <div className='mx-[50px]'>
        <div className='ml-2 mb-3 text-xl font-semibold text-white'>
          A regarder
        </div>
        <Slider {...settings}>
          {section2.map((movie, index) => (
            <div key={index} onClick={() => handleMovieClick(movie.id)}>
              <div className='h-[400px] mx-1'>
                <div className='h-full w-full'>
                  <img
                    src={`https://image.tmdb.org/t/p/w300${movie.image}`}
                    alt={movie.name}
                    className='w-full h-full object-cover cursor-pointer rounded-xl'
                  />
                </div>
              </div>
            </div>
          ))}
        </Slider>
      </div>

      <div className='mx-[50px] mt-[80px]'>
        <div className='ml-2 mb-3 text-xl font-semibold  text-white'>
          En cours
        </div>
        <Slider {...settings}>
          {section3.map((movie, index) => (
            <div key={index} onClick={() => handleMovieClick(movie.id)}>
              <div className='h-[400px] mx-1'>
                <div className='h-full w-full'>
                  <img
                    src={`https://image.tmdb.org/t/p/w300${movie.image}`}
                    alt={movie.name}
                    className='w-full h-full object-cover cursor-pointer rounded-xl'
                  />
                </div>
              </div>
            </div>
          ))}
        </Slider>
      </div>

      <div className='mx-[50px] mt-[80px] pb-[80px]'>
        <div className='ml-2 mb-3 text-xl font-semibold text-white'>
          Fini
        </div>
        <Slider {...settings}>
          {section4.map((movie, index) => (
            <div key={index} onClick={() => handleMovieClick(movie.id)}>
              <div className='h-[400px] mx-1'>
                <div className='h-full w-full'>
                  <img
                    src={`https://image.tmdb.org/t/p/w300${movie.image}`}
                    alt={movie.name}
                    className='w-full h-full object-cover cursor-pointer rounded-xl'
                  />
                </div>
              </div>
            </div>
          ))}
        </Slider>
      </div>
      {selectedMovie && <Modal movie={selectedMovie} onClose={handleCloseModal} />}
    </div>
  );
}
