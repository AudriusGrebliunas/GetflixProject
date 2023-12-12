import React, { useState } from 'react';

const Navbar = () => {
  const [showProfileMenu, setShowProfileMenu] = useState(false);
  const [searchTerm, setSearchTerm] = useState('');

  const handleSearch = () => {
    console.log('Recherche de films avec le terme :', searchTerm);
    // Vous pouvez ajouter ici la logique de recherche réelle
    // Par exemple, appeler une fonction qui effectue une recherche API
  };

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
              value={searchTerm}
              onChange={(e) => setSearchTerm(e.target.value)}
              onKeyPress={handleKeyPress}
            />
            <button className="flex items-center justify-center px-4 border-l" onClick={handleSearch}>
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
          {/* Contenu du menu de profil */}
        </div>
      )}
    </div>
  );
};

export default Navbar;

