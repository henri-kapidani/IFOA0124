import { useEffect, useState } from 'react';
import { baseApiUrl } from '../constants.js';
import { Link } from 'react-router-dom/dist';

const Home = () => {
    const [posts, setPosts] = useState([]);
    const [deletes, setDeletes] = useState(0);
    const [lastPage, setLastPage] = useState(null);
    const [currentPage, setCurrentPage] = useState(1);

    useEffect(() => {
        fetch(`${baseApiUrl}/posts?page=${currentPage}&_embed=1`)
            .then((res) => {
                // recupera i dati della paginazione dagli header
                setLastPage(parseInt(res.headers.get('X-WP-TotalPages')));
                return res.json();
            })
            .then((data) => {
                console.log(data);
                setPosts(data);
            });
    }, [currentPage, deletes]);

    const changePage = (page) => {
        setCurrentPage(page);
    };

    function generatePaginationArray() {
        let paginationArr = [];
        for (let index = 1; index <= lastPage; index++) {
            paginationArr.push({
                n: index,
                active: currentPage === index,
            });
        }
        return paginationArr;
        /*
    [
        {
            n: 1,
            active: false
        },
        {
            n: 2,
            active: true
        },
        {
            n: 3,
            active: false
        },

    ]
    */
    }

    const deletePost = (postId) => {
        const authString = btoa('asdf:B3HB GUfd yfPZ mlFi TU5e uVF5');
        fetch(`${baseApiUrl}/posts/${postId}`, {
            headers: {
                Authorization: `Basic ${authString}`,
            },
            method: 'DELETE',
            // body: JSON.stringify(obj)
        }).then((res) => {
            if (res.ok) {
                setDeletes(deletes + 1);
            }
        });
    };

    return (
        <>
            <ul>
                {posts.map((post) => (
                    <li key={post.id}>
                        {/* <img
                            src={
                                post._embedded['wp:featuredmedia']
                                    ? post._embedded['wp:featuredmedia'][0]
                                          .source_url
                                    : '/assets/picsum53.jpg'
                            }
                            alt=""
                        /> */}
                        <Link to={`/posts/${post.id}`}>
                            {post.title.rendered}
                        </Link>
                        <button
                            className="btn btn-danger"
                            onClick={() => deletePost(post.id)}
                        >
                            Delete
                        </button>
                    </li>
                ))}
            </ul>

            <nav>
                <ul className="pagination">
                    <li
                        className={`page-item ${
                            currentPage === 1 && 'disabled'
                        }`}
                    >
                        <span
                            className="page-link"
                            onClick={() =>
                                currentPage !== 1 && changePage(currentPage - 1)
                            }
                        >
                            Previous
                        </span>
                    </li>

                    {generatePaginationArray().map((page) => (
                        <li
                            key={page.n}
                            className={`page-item ${page.active && 'active'}`}
                        >
                            <span
                                className="page-link"
                                onClick={() => changePage(page.n)}
                            >
                                {page.n}
                            </span>
                        </li>
                    ))}

                    <li
                        className={`page-item ${
                            currentPage === 'lastPage' && 'disabled'
                        }`}
                    >
                        <span
                            className="page-link"
                            onClick={() =>
                                currentPage !== lastPage &&
                                changePage(currentPage + 1)
                            }
                        >
                            Next
                        </span>
                    </li>
                </ul>
            </nav>
        </>
    );
};

export default Home;
