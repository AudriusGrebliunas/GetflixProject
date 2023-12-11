import React from 'react'
import ReactDOM from 'react-dom/client'
import App from './App.jsx'
import './index.css';
import 'tailwindcss/tailwind.css'
import Navbar from './Compenant/navbar.jsx';
import CategoryPage from './categorie.jsx';
import Nouveaute from './nouveaute.jsx';
import Wishlist from './wishlist.jsx';
import Home from './home.jsx';

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    
    <App />
  </React.StrictMode>,
)
