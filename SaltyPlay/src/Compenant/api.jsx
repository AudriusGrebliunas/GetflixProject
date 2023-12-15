
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


//Get all movies by genre

// export const getAllMoviesByGenre = async () => 
// try{}
// axios.get('/user', {
//     params: {
//       selectedGenre: selectedGenre
//     }
//   })
//   .then(function (response) {
//     console.log(response);
//   })
//   .catch(function (error) {
//     console.log(error);
//   })

export const getAllMoviesByGenre = async (selectedGenre) => {
  try {
    const response = await apiDB.get(`movies/getAllMoviesByGenre.php`, 
     {
      selectedGenre: selectedGenre
    })
    return response.data;
    }
  catch (error) {
    console.error('Erreur lors de la récupération des informations sur les films:', error);
    return null;
  }
};

export const getMovieByMovieName = async (selectedGenre) => {
  try {
    const response = await apiDB.get(`movies/movie.php`, 
     {
      q: movieName
    })
    return response.data;
    }
  catch (error) {
    console.error("Erreur lors de la recherche d'un film par son nom:", error);
    return null;
  }
};


/**WISHLIST */

/**WISHLIST ADD */

  export const wishlistAdd = async (status, name, email) => {
    const datas = {
      user_id: user_id, 
      id: id,
      radius: radius
    }
    try {
      const response = await fetch('http://localhost/wishlist/add.php', {
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

/**GET WISHLIST BY USER */

  export const getWishlistByUser = async (email) => {
  try {
    const response = await apiDB.get(`wishlist/wishlist.php`, {
      email: email
    })
    return response.data;
    }
  catch (error) {
    console.error('Erreur lors de la récupération des informations sur les films:', error);
    return null;
  }
};




/**PUT: UPDATE WISHLIST */

  export const modifyWishlist = async (user_id, name, status) => {
    const datas = {
      user_id: user_id, 
      movie_id: movie_id,
      status: status
    }
    try {
      const response = await fetch('http://localhost/wishlist/wishlist.php', {
        method: 'PUT',
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





/**DELETE: DELETE FROM WISHLIST */


export const deleteFromWishlist = async (user_id, movie_id) => {
    const datas = {
      user_id: user_id, 
      movie_id: movie_id
    }
    try {
      const response = await fetch('http://localhost/wishlist/wishlist.php', {
        method: 'DELETE',
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










  export const passwordEdit = async (password, email) => {
    const datas = {
      email: email, 
      password: password    
    }
    try {
      const response = await fetch('http://localhost/user/passwordEdit.php', {
        method: 'PUT',
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

  export const checkSecretQuestion = async (answer, email) => {
    const datas = {
      answer: answer, 
      email: email
    }
    try {
      const response = await fetch('http://localhost/user/secretQuestion.php', {
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

  export const getUserProfile = async (email) => {
    const datas = {
      email: email     
    }
    try {
      const response = await fetch('http://localhost/user/userProfile.php', {
        method: 'GET',
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

  export const updateUserProfile = async (first_name, last_name, email, address, dob, password) => {
    const datas = {
      first_name: first_name, 
      last_name:last_name,
      email: email, 
      address: address,
      dob: dob,
      password: password   
    }
    try {
      const response = await fetch('http://localhost/user/userProfile.php', {
        method: 'PUT',
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

  export const deleteUserProfile = async (email) => {
    const datas = {
      email: email
    }
    try {
      const response = await fetch('http://localhost/user/userProfile.php', {
        method: 'DELETE',
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

  export const addRating = async (email, name, rating) => {
    const datas = {
      email: email, 
      name: name, 
      rating: rating
    }
    try {
      const response = await fetch('http://localhost/rating/add.php', {
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

  export const deleteMovieRating = async (movie_id) => {
    const datas = {
      movie_id: movie_id
    }
    try {
      const response = await fetch('http://localhost/rating/getByMovie.php', {
        method: 'GET',
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

  export const getMovieRating = async (movie_id) => {
    const datas = {
      movie_id: movie_id
    }
    try {
      const response = await fetch('http://localhost/rating/getByUser.php', {
        method: 'GET',
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

  export const getOneRating = async (movie_id, user_id) => {
    const datas = {
      movie_id: movie_id, 
      user_id: user_id
    }
    try {
      const response = await fetch('http://localhost/rating/rating.php', {
        method: 'GET',
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

  export const updateOneRating = async (movie_id, user_id, rating) => {
    const datas = {
      movie_id: movie_id, 
      user_id: user_id, 
      rating: rating
    }
    try {
      const response = await fetch('http://localhost/rating/rating.php', {
        method: 'PUT',
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

  export const deleteOneRating = async (movie_id, user_id) => {
    const datas = {
      movie_id: movie_id, 
      user_id: user_id
    }
    try {
      const response = await fetch('http://localhost/rating/rating.php', {
        method: 'PUT',
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

  export const getAllRatings = async () => {
    try {
      const response = await fetch('http://localhost/rating/allRatings.php', {
        method: 'GET',
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



