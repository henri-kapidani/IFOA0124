import { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';

const FacultyPage = () => {
    const [faculty, setFaculty] = useState(null); // null buon candidato
    const { id } = useParams();

    useEffect(() => {
        fetch(`http://localhost:8000/api/v1/faculties/${id}`)
            .then((res) => res.json())
            .then((data) => setFaculty(data));
    }, [id]);

    return (
        faculty && (
            <>
                <h1>{faculty.data.name}</h1>
                <h2>{faculty.data.address}</h2>
                Phone: {faculty.data.telephone}
            </>
        )
    );
};

export default FacultyPage;
