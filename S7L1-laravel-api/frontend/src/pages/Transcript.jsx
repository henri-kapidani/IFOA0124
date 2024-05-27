import axios from 'axios';
import { useEffect, useState } from 'react';

const Transcript = () => {
    const [exams, setExams] = useState([]);

    useEffect(() => {
        axios
            .get('/api/v1/transcript')
            .then((res) => setExams(res.data.data.exams));
    }, []);

    return (
        <div>
            <h1>Libretto degli esami</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">Date</th>
                        <th scope="col">Mark</th>
                    </tr>
                </thead>
                <tbody>
                    {exams.map((exam) => (
                        <tr>
                            <td>{exam.course.subject.name}</td>
                            <td>{exam.date}</td>
                            <td>{exam.pivot.mark}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
};

export default Transcript;

// rafcp
