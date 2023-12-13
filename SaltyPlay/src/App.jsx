import { useState } from "react";
import { createBrowserRouter, RouterProvider } from "react-router-dom";
import "./index.css";
import Connexion from "./Compenant/Connexion";
import Register from "./Compenant/Register";
import Wishlist from "./wishlist";

export default function App() {
  const router = createBrowserRouter([
    {
      path: "/",
      element: <Connexion />,
    },
    {
      path: "/register",
      element: <Register />,
    },
    {
      path: "/wishlist",
      element: <Wishlist />,
    },
  ]);

  return (
    <div className="App">
      <RouterProvider router={router} />
    </div>
  );
}
