import { useState } from 'react'
import {
  createBrowserRouter,
  RouterProvider,
} from "react-router-dom";
import "./index.css";
import Connexion from './connexion'
import Register from './register'
import Wishlist from './wishlist';
import ConnexionPage from './connexion';
import CategoryPage from './categorie';
import View from './view';

export default function App() {

  const router = createBrowserRouter([
    {
      path: "/",
      element: <ConnexionPage />
    },
    {
      path: "register",
      element: <Register />
    }
    ,
    {
      path: "wishlist",
      element: <Wishlist />
    }
    ,
    {
      path: "categorie",
      element: <CategoryPage />
    }
    ,
    {
      path: "view",
      element: <View />
    }
  ]);
  
  return (
    <div className="App">
      <RouterProvider router={router} />
    </div>
  )
}