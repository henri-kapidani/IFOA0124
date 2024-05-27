import { BrowserRouter, Routes, Route, Navigate } from 'react-router-dom';
import Home from './pages/Home';
import Login from './pages/Login';
import Register from './pages/Register';
import FacultyPage from './pages/FacultyPage';
import './App.css';
import axios from 'axios';
import TopNav from './components/TopNav';
import { useEffect, useState } from 'react';
import { useDispatch } from 'react-redux';
import { LOGIN } from './redux/actions';
import ProtectedRoutes from './pages/ProtectedRoutes';
import GuestRoutes from './pages/GuestRoutes';
import NotFound from './pages/NotFound';

function App() {
    axios.defaults.withCredentials = true;
    axios.defaults.withXSRFToken = true;

    const dispatch = useDispatch();
    const [loaded, setLoaded] = useState(false);

    useEffect(() => {
        axios('/api/user')
            .then((res) =>
                dispatch({
                    type: LOGIN,
                    payload: res.data,
                })
            )
            .catch((err) => console.log(err))
            .finally(() => setLoaded(true));
    }, [dispatch]);

    return (
        loaded && (
            <BrowserRouter>
                <TopNav />
                <div className="container">
                    <Routes>
                        {/* rotte accessibili da tutti */}
                        <Route path="/" element={<Home />} />

                        {/* rotte accessibili solo se sei loggato */}
                        <Route element={<ProtectedRoutes />}>
                            <Route
                                path="/faculties/:id"
                                element={<FacultyPage />}
                            />
                        </Route>

                        {/* rotte accessibili solo se NON sei loggato */}
                        <Route element={<GuestRoutes />}>
                            <Route path="/login" element={<Login />} />
                            <Route path="/register" element={<Register />} />
                        </Route>

                        <Route path="/404" element={<NotFound />} />
                        <Route path="*" element={<Navigate to="/404" />} />
                    </Routes>
                </div>

                {/* <Footer /> */}
            </BrowserRouter>
        )
    );
}

export default App;
