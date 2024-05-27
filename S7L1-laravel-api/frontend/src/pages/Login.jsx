import { useState } from 'react';

const Login = () => {
    const [formData, setFormData] = useState({
        email: '',
        password: '',
    });

    const updateInputValue = (ev) => {
        setFormData((oldFormData) => ({
            ...oldFormData,
            [ev.target.name]: ev.target.value,
        }));
    };

    const submitLogin = (ev) => {
        ev.preventDefault();
        console.log(formData);
        // TODO: fetch per loggarsi
        // recuperare il csrf token e il session token
        fetch('/sanctum/csrf-cookie');
        // fetch con email e password per loggarci

        // fetch per recuperare i dati dell'utente
    };

    return (
        <form onSubmit={(ev) => submitLogin(ev)} noValidate>
            <div className="mb-3">
                <label htmlFor="email" className="form-label">
                    Email address
                </label>
                <input
                    type="email"
                    className="form-control"
                    id="email"
                    name="email"
                    onChange={(ev) => updateInputValue(ev)}
                    value={formData.email}
                />
            </div>
            <div className="mb-3">
                <label htmlFor="password" className="form-label">
                    Password
                </label>
                <input
                    type="password"
                    className="form-control"
                    id="password"
                    name="password"
                    onChange={(ev) => updateInputValue(ev)}
                    value={formData.password}
                />
            </div>
            {/* <div className="mb-3 form-check">
                <input
                    type="checkbox"
                    className="form-check-input"
                    id="exampleCheck1"
                />
                <label className="form-check-label" htmlFor="exampleCheck1">
                    Check me out
                </label>
            </div> */}
            <button type="submit" className="btn btn-primary">
                Login
            </button>
        </form>
    );
};

export default Login;
