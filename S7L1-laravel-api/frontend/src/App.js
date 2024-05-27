import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Home from './pages/Home';
import Login from './pages/Login';
import Register from './pages/Register';
import FacultyPage from './pages/FacultyPage';
import './App.css';
import axios from 'axios';
import TopNav from './components/TopNav';

function App() {
    axios.defaults.withCredentials = true;
    axios.defaults.withXSRFToken = true;

    return (
        <BrowserRouter>
            <TopNav />
            <div className="container">
                <Routes>
                    <Route path="/" element={<Home />} />
                    <Route path="/login" element={<Login />} />
                    <Route path="/register" element={<Register />} />
                    <Route path="/faculties/:id" element={<FacultyPage />} />
                </Routes>
            </div>

            {/* <Footer /> */}
        </BrowserRouter>
    );
}

export default App;
