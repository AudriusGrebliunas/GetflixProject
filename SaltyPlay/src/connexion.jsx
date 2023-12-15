import React, { useState } from 'react';
import { useNavigate, Link } from 'react-router-dom';
import './App.css';
import 'tailwindcss/tailwind.css';
//import axios from 'axios';
import { checkLogin} from "./Compenant/api.jsx"

const ConnexionPage = () => {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const navigate = useNavigate();

  const handleSubmit = async (event) => {
    event.preventDefault();
    userLogin(email, password);
  };

   async function userLogin(email,password) {
    try {
      const result = await checkLogin(email, password);
      if (result.status === "200"){
      localStorage.setItem("email", email);
      navigate('/wishlist');
    }else{
      document.getElementById("errorMessage").innerText = result.message
    }
      
    
      console.log(result); 
    } catch (error) {
      console.error('Error during login:', error);
    }
   }


  return (
    <div className="flex flex-col items-center justify-center min-h-screen bg-gray-800">
      <div className="text-7xl font-bold text-white mb-8">SALTY</div>
      <div id="errorMessage"></div>
      <form onSubmit={handleSubmit} className="w-full max-w-xs">
        <input
          type="email"
          name="email"
          value={email}
          onChange={(e) => setEmail(e.target.value)}
          className="bg-gray-700 text-white rounded py-3 px-4 mb-3 w-full"
          placeholder="Email"
          required
        />
        <input
          type="password"
          name="password"
          value={password}
          onChange={(e) => setPassword(e.target.value)}
          className="bg-gray-700 text-white rounded py-3 px-4 mb-3 w-full"
          placeholder="Password"
          required
        />
        <button
          type="submit"
          className="bg-gray-600 text-white rounded py-3 px-4 w-full"
        >
          Login
        </button>
        <div className="bg-gray-600 text-white rounded py-3 px-4 w-full mt-3 text-center">
        <Link
          to="/register"
          relative="path"
          
        >
          Register
        </Link>
        </div>
      </form>
      <div className="text-white mt-4">
        <a href="/forgot-password" className="hover:text-gray-300">
          mot de passe oublié
        </a>
      </div>
    </div>
  );
};

export default ConnexionPage;
