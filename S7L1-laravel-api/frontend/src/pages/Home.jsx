import { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';

const Home = () => {
    const [faculties, setFaculties] = useState([]); // null buon candidato

    useEffect(() => {
        fetch('/api/v1/faculties')
            .then((res) => res.json())
            .then((data) => setFaculties(data));
    }, []);

    return (
        <>
            {faculties.map((faculty) => (
                <div key={faculty.id}>
                    <h2>{faculty.name}</h2>{' '}
                    <Link to={`/faculties/${faculty.id}`}>Dettagli</Link>
                    <ul>
                        {faculty.degrees.map((degree) => (
                            <li key={degree.id}>{degree.name}</li>
                        ))}
                    </ul>
                </div>
            ))}
        </>
    );
};

export default Home;

// http://localhost:3000/   ----->    http://localhost:8000/
