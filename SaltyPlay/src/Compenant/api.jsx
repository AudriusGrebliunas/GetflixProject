// // api.js
// import axios from 'axios';

// const apiKey = 'e6469fd4a12ae30bb7b2178e0abf7173';

// const tmdbApi = axios.create({
//   baseURL: 'https://api.themoviedb.org/3/',
// });

// export const getMovieInfo = async (movieId) => {
//   try {
//     const response = await tmdbApi.get(`movie/${movieId}`, {
//       params: {
//         api_key: apiKey,
//       },
//     });
//     return response.data;
//   } catch (error) {
//     console.error('Erreur lors de la récupération des informations sur le film:', error);
//     return null;
//   }
// };

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
// };

// const shuffleArray = (array) => {
//   for (let i = array.length - 1; i > 0; i--) {
//     const j = Math.floor(Math.random() * (i + 1));
//     [array[i], array[j]] = [array[j], array[i]];
//   }
//   return array;
// };
import axios from 'axios';

const apiDB = axios.create({
  baseURL: 'https://saltybecode2.000webhostapp.com/',
});

export const getMoviesInfo = async () => {
  try {
    const response = await apiDB.get(`movies/getAllMovies.php`);
    return response.data.data;
  } catch (error) {
    console.error('Erreur lors de la récupération des informations sur le film:', error);
    return null;
  }
};

// ASYNC AWAIT

export const checkLogin = async (email, password) => {
    const datas = {
      email: email, 
      password: password
    }
    try {
      const response = await fetch('http://localhost/user/login.php', {
        method: 'POST',
        body: JSON.stringify(datas)
      });
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      const data = await response.json();
      return data;
    } catch (error) {
      console.error('Error:', error);
    }
  }

  export const postRegister = async (first_name, last_name, email, password, address, dob, question, questionAnswer) => {
    const datas = {
      email: email, 
      password: password,
      first_name: first_name,
      last_name: last_name,
      password: password,
      address: address,
      dob: dob,
      question: question,
      questionAnswer: questionAnswer 
      
    }
    try {
      const response = await fetch('http://localhost/user/register.php', {
        method: 'POST',
        body: JSON.stringify(datas)
      });
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      const data = await response.json();
      return data;
    } catch (error) {
      console.error('Error:', error);
    }
  }


// PUT
// const joke = {
//   setup: 'Why did the chicken cross the road?',
//   punchline: 'To get to the other side!'
// };
// const options = {
//   method: 'POST',
//   headers: {
//     'Content-Type': 'application/json',
//     'X-RapidAPI-Key': 'your-api-key',
//     'X-RapidAPI-Host': 'jokes-by-api-ninjas.p.rapidapi.com',
//   },
//   body: JSON.stringify(joke)
// };
// fetch('https://jokes-by-api-ninjas.p.rapidapi.com/v1/jokes', options)
//   .then(response => response.json())
//   .then(data => console.log(data))
//   .catch(error => console.error(error));
// //   try {
//     const response = await apiDB.post(`user/login.php`, {
//         "email": email,
//         "password": password
//     });
//   let userLogin = response.data.data;
//   console.log(userLogin);
//   return userLogin;
// } catch (error) {
//   console.error('Erreur lors du log-in', error);
//   return null;
// }
//};



