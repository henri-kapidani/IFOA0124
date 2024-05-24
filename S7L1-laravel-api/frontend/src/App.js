import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Home from './pages/Home';
import FacultyPage from './pages/FacultyPage';
import './App.css';

function App() {
    return (
        <BrowserRouter>
            {/* <Navbar /> */}

            <Routes>
                <Route path="/" element={<Home />} />
                <Route path="/faculties/:id" element={<FacultyPage />} />
            </Routes>

            {/* <Footer /> */}
        </BrowserRouter>
    );
}

export default App;
