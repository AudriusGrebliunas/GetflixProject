import React, { useState } from "react";
import { Link } from "react-router-dom";
import 'tailwindcss/tailwind.css';
import './Forgot-password.css';

const checkEmailInDB = async (email) => {
  // Simule une requête asynchrone pour vérifier l'email dans la base de données
  return new Promise(resolve => {
    setTimeout(() => {
      // Suppose que l'email est dans la base de données après 2 secondes
      resolve(true);
    }, 2000);
  });
};

const ForgetPassword = () => {
  const [email, setEmail] = useState("");

  const handleReset = async (e) => {
    e.preventDefault();

    // Vérifie si l'email est dans la base de données
    const emailInDB = await checkEmailInDB(email);

    if (email === "ahmedbnz47@gmail.com") {
      // Utilise Link pour créer un lien vers la nouvelle page
      // Assure-toi que "/SecretQuestion" correspond à la route correcte dans React Router
      return <Link to="/SecretQuestion" />;
    } else {
      console.log("Email non trouvé");
    }
  };

  return (
    <div className="flex flex-col items-center justify-center w-screen h-screen bg-gray-800">
      <div className="text-5xl font-bold text-white mb-3">SALTY</div>
      <form onSubmit={handleReset} className="w-full max-w-xs">
        <input
          type="email"
          name="email"
          value={email}
          onChange={(e) => setEmail(e.target.value)}
          className="bg-gray-700 text-white rounded py-3 px-4 mb-3 w-full"
          placeholder="Email"
          required
        />
        <button
          type="submit"
          className="bg-gray-600 text-white rounded py-3 px-4 w-full"
        >
          Check
        </button>
      </form>
    </div>
  );
};

export default ForgetPassword;

