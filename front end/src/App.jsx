import React, { useState } from "react";

const RegisterPage = () => {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");

  const handleRegister = (event) => {
    event.preventDefault();
    console.log("Register with:", email, password);
  };

  return (
    <div className="flex flex-col items-center justify-center min-h-screen bg-gray-800">
      <div className="text-7xl font-bold text-white mb-8">SALTY</div>
      <form onSubmit={handleRegister} className="w-full max-w-xs">
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
          className="bg-gray-600 text-white rounded py-3 px-4 w-full "
        >
          Register
        </button>
      </form>
      <div className="text-white mt-4">
        <a href="/forgot-password" className="hover:text-gray-300">
          mot de passe oublié
        </a>
      </div>
    </div>
  );
};

export default RegisterPage;
