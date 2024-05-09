const AddPost = () => {
    return <></>;
};

export default AddPost;

/*
const selectedFile = event.target.files[0];
const body = new FormData();
body.append('file', selectedFile, selectedFile.name);
body.append('title', 'Title');
body.append('caption', 'Caption');

const queryString = btoa('user:password');
this.fetch
    .post('/wp-json/wp/v2/media', {
        headers: {
            'Content-Disposition': `attachment; filename=${selectedFile.name}`,
            Authorization: `Bearer ${queryString}`,
            'content-type': 'image',
        },
        body: body,
    })
    .then((res) => res.json)
    .then((data) => console.log(data));
    */
