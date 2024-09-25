import React, {Component, useState} from 'react';
import axios from 'axios';

const PostForm = () => {
    const [message, setMessage] = useState('');

    const handleMessageTextChange = (message) => {
        setMessage(message);
    };

    const submitHandler = (event) => {
        event.preventDefault();
        const title = event.target.title.value;
        const description  = event.target.description.value;
        const body = event.target.body.value;
        const data = { title, description, body };
        let csrfToken = window.csrfToken;

        axios
            .post(
                "/api/posts/add",
                data,
                {
                    headers: {
                        'X-CSRF-Token': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest',
                    }
                })
            .then((response) => {
                    console.log(response.data.success);
                    if (response.data.success === true) {
                        handleMessageTextChange(response.data.message);
                        event.target.reset();
                        //window.location.reload();
                    } else {
                        handleMessageTextChange(response.data.error);
                    }
                }
            )
            .catch((error) => {
                console.log(error);
            });

    }

    return (
        <div>
            <form onSubmit={submitHandler}>
                <div>
                    <label>Title</label>
                    <input type="text" name="title" placeholder="Post Title"  />
                </div>
                <div>
                    <label>Description</label>
                    <input type="text" name="description" placeholder="Post Description"  />
                </div>
                <div>
                    <label>Post Body</label>
                    <textarea name="body" placeholder="Post Body"  />
                </div>
                <div>
                    <div id="success">{message}</div>
                    <button
                        type="submit"
                        className="btn btn-primary"
                        id="sendMessageButton"
                    >
                        Send
                    </button>
                </div>

            </form>
        </div>
    )
}

export default PostForm;
