import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Home from './components/Home';
import Navbar from './components/Navbar';
import PostDetails from './components/PostDetails';
import './app.css';

function App() {
    return (
        <BrowserRouter>
            <Navbar />
            <Routes>
                <Route path="/" element={<Home />} />
                <Route path="/posts/:id" element={<PostDetails />} />
            </Routes>
        </BrowserRouter>
    );
}

export default App;
