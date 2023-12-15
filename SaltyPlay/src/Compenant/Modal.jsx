import React from 'react';
import YouTube from 'react-youtube';

function extractVideoIdFromUrl(url) {
  const match = url.match(/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/);
  return match ? match[1] : null;
}

const VideoPlayer = ({ youtubeUrl }) => {
  const videoId = extractVideoIdFromUrl(youtubeUrl);

  const opts = {
    height: '390',
    width: '640',
    playerVars: {
      autoplay: 0,
    },
  };

  return (
    <div>
      {videoId ? (
        <YouTube videoId={videoId} opts={opts} />
      ) : (
        <p>URL YouTube non valide.</p>
      )}
    </div>
  );
};

const Modal = ({ movie, onClose }) => {
  return (
    <div className="fixed inset-0 z-50 flex items-center justify-center">
      <div className="absolute inset-0 bg-black opacity-50"></div>
      <div className="bg-white p-8 rounded-lg z-10 h-[80%] w-[80%]">
        <div className="flex justify-end">
          <button className="text-2xl text-gray-600" onClick={onClose}>&times;</button>
        </div>
        <h2 className="text-3xl font-semibold mb-4">{movie.name}</h2>
        <h2 className="text-3xl font-semibold mb-4">{movie.author}</h2>
        <h2 className="text-3xl font-semibold mb-4">{movie.resume}</h2>
        <h2 className="text-3xl font-semibold mb-4">{movie.year}</h2>
        <VideoPlayer youtubeUrl={movie.link_yt} />
      </div>
    </div>
  );
};

export default Modal;

