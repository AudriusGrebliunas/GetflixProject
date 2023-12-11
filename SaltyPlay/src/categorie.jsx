import React from 'react';

const CategoryPage = () => {
  return (
    <div className="flex">
    
      <div className="w-1/4">
        <ul className="space-y-4">
          <li>ACTION</li>
          <li>ROMANCE</li>
          <li>HORREUR</li>
          <li>INTRIGUE</li>
          <li>ANIME</li>
          <li>HUMOUR</li>
        </ul>
      </div>
     
      <div className="w-3/4 grid grid-cols-3 gap-4 p-4">
        {Array.from({ length: 9 }).map((_, index) => (
          <div key={index} className="bg-gray-700 h-32"></div>
        ))}
      </div>
    </div>
  );
};

export default CategoryPage;
