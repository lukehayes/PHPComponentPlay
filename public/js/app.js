import axios from 'axios';

let addr = 'https://jsonplaceholder.typicode.com/todos/'

axios.get(addr)
  .then((response) => {

    console.dir('Response:', response);
    console.dir('Data:', response.data.a);

  }).catch((error) => {
    console.log(error);
  });

