import { useState } from 'react';

function App() {
  const [posts, setPosts] = useState([]);

  const loadPosts = () =>
    fetch('/IFOA0124/S1L2-dati-e-server/api-with-react/api-backend/posts.php')
      .then((res) => res.json())
      .then((data) => setPosts(data));

  const loginUser = () =>
    fetch(
      '/IFOA0124/S1L2-dati-e-server/api-with-react/api-backend/create-user.php',
      {
        method: 'POST',
        body: JSON.stringify({
          username: 'Pinco',
          password: 'asdf',
        }),
      }
    )
      .then((res) => res.json())
      .then((data) => console.log(data));

  return (
    <div className="App">
      <h1>L'api di questo frontend React è fatta in php da noi!!</h1>
      <button onClick={loadPosts}>Carica</button>
      <button onClick={loginUser}>Login</button>

      {posts.length !== 0 && (
        <ul>
          {posts.map((post) => (
            <li>{post.title}</li>
          ))}
        </ul>
      )}
    </div>
  );
}

export default App;
