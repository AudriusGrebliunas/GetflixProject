import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { Link } from "react-router-dom";


const Navbar = () => {
  const [showProfileMenu, setShowProfileMenu] = useState(false);
  const [searchTerm, setSearchTerm] = useState('');
  const [searchResults, setSearchResults] = useState([]);

  const handleSearch = async () => {
    try {
      if (searchTerm.trim() === '') {
        setSearchResults([]);
        return;
      }

      const apiKey = 'e6469fd4a12ae30bb7b2178e0abf7173'; 
      const url = `https://api.themoviedb.org/3/search/movie?api_key=${apiKey}&query=${searchTerm}`;

      const response = await axios.get(url);
      setSearchResults(response.data.results);
    } catch (error) {
      console.error('Error fetching data:', error);
    }
  };

  useEffect(() => {
    handleSearch();
  }, [searchTerm]);

  const handleKeyPress = (e) => {
    if (e.key === 'Enter') {
      handleSearch();
    }
  };

  const toggleProfileMenu = () => {
    setShowProfileMenu(!showProfileMenu);
  };

  return (
    <div className="container mx-auto px-4">
      <nav className="flex justify-between items-center py-4 bg-transparent">
        <div className="flex space-x-4">
          <a href="./main.jsx" className="text-gray-300 hover:text-white">
            Home
          </a>
          <a href="./categorie.jsx" className="text-gray-300 hover:text-white">
            <Link to="/categorie">Catégorie</Link>
          </a>
          <a href="#" className="text-gray-300 hover:text-white">
            Nouveautés
          </a>
          <a href="#" className="text-gray-300 hover:text-white">
            Ma Liste
          </a>
        </div>
        <div className="text-4xl font-bold text-white">SALTY</div>
        <div className="flex space-x-4 items-center">
          <div className="relative">
            <input
              type="text"
              className="p-2 pr-8 border border-gray-500 rounded"
              value={searchTerm}
              onChange={(e) => setSearchTerm(e.target.value)}
              onKeyPress={handleKeyPress}
            />
            <button
              className="absolute top-0 right-0 bg-gray-500 text-white rounded h-[42px] px-[10px] text-sm"
              onClick={handleSearch}
            >
              Rechercher
            </button>
          </div>
          {searchResults.length > 0 && (
            <div className="mt-2">
              <h2>Résultats de la recherche :</h2>
              <ul>
                {searchResults.map((movie) => (
                  <li key={movie.id}>{movie.title}</li>
                ))}
              </ul>
            </div>
          )}

          <div>
            <a
              href="#"
              className="text-gray-300 hover:text-white"
              onClick={toggleProfileMenu}
            >
              <i className="fas fa-user"></i>
            </a>
          </div>
        </div>
      </nav>

      {showProfileMenu && (
        <div className="bg-white p-2 absolute right-0 mt-2 rounded shadow">
        </div>
      )}
    </div>
  );
};

export default Navbar;
