import React, { useState } from 'react';

const Navbar = () => {
  const [showProfileMenu, setShowProfileMenu] = useState(false);

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
            Categories
          </a>
          <a href="#" className="text-gray-300 hover:text-white">
            Nouveautés
          </a>
          <a href="#" className="text-gray-300 hover:text-white">
            Ma Liste
          </a>
        </div>
        <div className="text-4xl font-bold">SALTY</div>
        <div className="flex space-x-4">
          <div className="flex bg-gray-700 text-gray-400 rounded overflow-hidden">
            <input
              type="text"
              className="px-4 py-2 bg-transparent outline-none" 
              placeholder="Recherche"
            />
            <button className="flex items-center justify-center px-4 border-l">
              <i className="fas fa-search text-gray-400"></i>
            </button>
          </div>
          <a
            href="#"
            className="text-gray-300 hover:text-white"
            onClick={toggleProfileMenu} 
          >
            <i className="fas fa-user"></i>
          </a>
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
