import { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';

const FacultyPage = () => {
    const [faculty, setFaculty] = useState(null); // null buon candidato
    const { id } = useParams();

    useEffect(() => {
        fetch(`http://localhost:8000/api/v1/faculties/${id}`)
            .then((res) => res.json())
            .then((data) => setFaculty(data.data));
    }, [id]);

    return (
        faculty && (
            <>
                <h1>{faculty.name}</h1>
                <h2>{faculty.address}</h2>
                Phone: {faculty.telephone}
            </>
        )
    );
};

export default FacultyPage;
