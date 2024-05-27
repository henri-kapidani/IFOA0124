import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Home from './pages/Home';
import Login from './pages/Login';
import Register from './pages/Register';
import FacultyPage from './pages/FacultyPage';
import './App.css';

function App() {
    return (
        <BrowserRouter>
            {/* <Navbar /> */}

            <Routes>
                <Route path="/" element={<Home />} />
                <Route path="/login" element={<Login />} />
                <Route path="/register" element={<Register />} />
                <Route path="/faculties/:id" element={<FacultyPage />} />
            </Routes>

            {/* <Footer /> */}
        </BrowserRouter>
    );
}

export default App;
