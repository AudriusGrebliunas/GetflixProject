// Modal.js
import React from 'react';

const Modal = ({ movie, onClose }) => {
  return (
    <div className="fixed inset-0 z-50 flex items-center justify-center">
      <div className="absolute inset-0 bg-black opacity-50"></div>
      <div className="bg-white p-8 rounded-lg z-10 h-[80%] w-[80%]">
        <div className="flex justify-end">
          <button className="text-2xl text-gray-600" onClick={onClose}>&times;</button>
        </div>
        <h2 className="text-3xl font-semibold mb-4">{movie.title}</h2>
        <p>Description du film, autres détails, etc.</p>
      </div>
    </div>
  );
};

export default Modal;
