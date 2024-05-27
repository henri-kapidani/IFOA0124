import { useSelector } from 'react-redux';
import { Link } from 'react-router-dom';

const TopNav = () => {
    const user = useSelector((state) => state.user);

    return (
        <nav className="navbar navbar-expand-lg bg-body-tertiary">
            <div className="container-fluid">
                <Link className="navbar-brand" to="/">
                    P.U.
                </Link>
                <button
                    className="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                >
                    <span className="navbar-toggler-icon"></span>
                </button>
                <div
                    className="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <ul className="navbar-nav me-auto mb-2 mb-lg-0">
                        <li className="nav-item">
                            <Link className="nav-link active" to="/">
                                Home
                            </Link>
                        </li>
                        <li className="nav-item dropdown">
                            <Link
                                className="nav-link dropdown-toggle"
                                to="/"
                                data-bs-toggle="dropdown"
                            >
                                Dropdown
                            </Link>
                            <ul className="dropdown-menu">
                                <li>
                                    <Link className="dropdown-item" to="/">
                                        Action
                                    </Link>
                                </li>
                                <li>
                                    <hr className="dropdown-divider" />
                                </li>
                                <li>
                                    <Link className="dropdown-item" to="/">
                                        Something else here
                                    </Link>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    {user ? (
                        <>
                            <span className="me-2">{user.name}</span>
                            <button className="btn btn-primary">Logout</button>
                        </>
                    ) : (
                        <>
                            <button className="btn btn-primary me-2">
                                Login
                            </button>
                            <button className="btn btn-primary">
                                Register
                            </button>
                        </>
                    )}

                    {/* <form className="d-flex" role="search">
                        <input
                            className="form-control me-2"
                            type="search"
                            placeholder="Search"
                            aria-label="Search"
                        />
                        <button
                            className="btn btn-outline-success"
                            type="submit"
                        >
                            Search
                        </button>
                    </form> */}
                </div>
            </div>
        </nav>
    );
};

export default TopNav;
