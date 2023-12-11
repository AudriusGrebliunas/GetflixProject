import { useState } from 'react'
import {
  createBrowserRouter,
  RouterProvider,
} from "react-router-dom";
import "./index.css";
import Connexion from './Compenant/Connexion'
import Register from './Compenant/Register'

export default function App() {

  const router = createBrowserRouter([
    {
      path: "/",
      element: <Connexion />
    },
    {
      path: "/register",
      element: <Register />
    }
  ]);
  
  return (
    <div className="App">
      <RouterProvider router={router} />
    </div>
  )
}