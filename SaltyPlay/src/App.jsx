import { useState } from 'react'
import {
  createBrowserRouter,
  RouterProvider,
} from "react-router-dom";
import "./index.css";
import Connexion from './connexion';
import Profile from './profile';
import Register from './register';
import Wishlist from './wishlist';
import ConnexionPage from './connexion';
import CategoryPage from './categorie';
import View from './view';
import ForgetPassword from './Forgot-password';
import SecretQuestion from './SecretQuestion';

export default function App() {

  const router = createBrowserRouter([
    {
      path: "/",
      element: <ConnexionPage />
     },
    {
      path: "wishlist",
      element: <Wishlist />
    }
    ,
    {
      path: "register",
      element: <Register />
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
    ,
    {
      path: "ForgotPassword",
      element: <ForgetPassword />
    }
    ,
    {
      path: "SecretQuestion",
      element: <SecretQuestion />
    },
    {
      path: "profile",
      element: <Profile />
    }
  ]);
  
  return (
    <div className="App">
      <RouterProvider router={router} />
    </div>
  )
}