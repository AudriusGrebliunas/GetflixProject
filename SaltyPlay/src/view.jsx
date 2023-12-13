
import React, { useState } from 'react';
import Navbar from './Compenant/navbar'; 

export default function View() {
  const [selectedCell, setSelectedCell] = useState(null);

  const handleCellClick = (index) => {
   
    if (index === selectedCell) {
      setSelectedCell(null);
    } else {
    
      setSelectedCell(index);
    }
  };

  const isFullScreen = selectedCell !== null;

  return (
    <div className="bg-slate-800">
      <Navbar />
      <div className={`w-screen grid grid-cols-3 gap-4 p-4 ${isFullScreen ? 'grid-cols-1' : 'grid-cols-3'}`}>
        {Array.from({ length: 24 }).map((_, index) => (
          <div
            key={index}
            className={`bg-gray-700 cursor-pointer ${
              isFullScreen ? (index === selectedCell ? 'col-span-3 h-screen' : 'hidden') : 'col-span-1 h-32'
            } ${index === selectedCell ? 'border-4 border-blue-500' : ''}`}
            onClick={() => handleCellClick(index)}
          >
            {index === selectedCell && <div className="text-white">Content to Display</div>}
          </div>
        ))}
      </div>
    </div>
  );
}