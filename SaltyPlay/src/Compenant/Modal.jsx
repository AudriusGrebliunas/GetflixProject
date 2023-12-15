import React from 'react';
import YouTube from 'react-youtube';

function extractVideoIdFromUrl(url) {
  const match = url.match(/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/);
  return match ? match[1] : null;
}

const VideoPlayer = ({ youtubeUrl }) => {
  const videoId = extractVideoIdFromUrl(youtubeUrl);

  const opts = {
    playerVars: {
      autoplay: 1,
      controls: 0,
      modestbranding: 1,
      loop: 1,
      playlist: videoId,
    },
  };

  return (
    <div className="flex flex-col object-cover w-[100%] h-[100%]">
      {videoId && <YouTube videoId={videoId} opts={opts} className=" object-cover" />}
    </div>
  );
};

const Modal = ({ movie, onClose }) => {
  return (
    <div className="fixed inset-0 flex flex-col items-center justify-center h-screen w-screen">
      <div className="bg-gray-700 p-8  rounded-lg z-20 relative h-full w-full bottom-0">
        <div className="flex justify-end">
          <button className="text-2xl text-white fixed absolute top-0" onClick={onClose}>&times;</button>
        </div>
        <div className='flex flex-col mb-0 text-white gap-40'>
        <div className='flex justify-center items-center '>
        <VideoPlayer youtubeUrl={movie.link_yt} />
        </div>
        <div>
          <h2 className="text-3xl font-semibold mb-4">{movie.name}</h2>
          <h2 className="text-3xl font-semibold mb-4">{movie.author}</h2>
          <h2 className="text-3xl font-semibold mb-4">{movie.resume}</h2>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Modal;
