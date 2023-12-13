// api.js
import axios from 'axios';

const apiDB = axios.create({
  baseURL: 'https://saltybecode2.000webhostapp.com/',
});

export const getMoviesInfo = async (movieId) => {
  try {
    const response = await apiDB.get(`movies/getAllMovies.php`);
    return response.data.data;
  } catch (error) {
    console.error('Erreur lors de la récupération des informations sur le film:', error);
    return null;
  }
};
// export const getMovieVideos = async (movieId) => {
//   try {
//     const response = await tmdbApi.get(`movie/${movieId}/videos`, {
//       params: {
//         api_key: apiKey,
//       },
//     });
//     return response.data.results;
//   } catch (error) {
//     console.error('Erreur lors de la récupération des vidéos du film:', error);
//     return null;
//   }
// };

// export const getRandomMovies = async (count = 5) => {
//   try {
//     const response = await tmdbApi.get('movie/popular', {
//       params: {
//         api_key: apiKey,
//         page: 1,
//       },
//     });

//     const movies = response.data.results;
//     const randomMovies = shuffleArray(movies).slice(0, count);

//     return randomMovies;
//   } catch (error) {
//     console.error('Erreur lors de la récupération des films aléatoires:', error);
//     return null;
//   }
// // };

// const shuffleArray = (array) => {
//   for (let i = array.length - 1; i > 0; i--) {
//     const j = Math.floor(Math.random() * (i + 1));
//     [array[i], array[j]] = [array[j], array[i]];
//   }
//   return array;
// };
