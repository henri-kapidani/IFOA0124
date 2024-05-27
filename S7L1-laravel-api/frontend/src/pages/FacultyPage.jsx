import { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';

const FacultyPage = () => {
    const [faculty, setFaculty] = useState(null); // null buon candidato
    const { id } = useParams();
    const navigate = useNavigate();

    useEffect(() => {
        fetch(`/api/v1/faculties/${id}`)
            .then((res) => {
                if (!res.ok) navigate('/404');
                return res.json();
            })
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
