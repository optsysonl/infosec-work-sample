import React, { useState, useEffect } from 'react';
import axios from 'axios';
import PostForm from "./PostForm";

const PostList = () => {
    const [posts, setPosts] = useState([]);

    useEffect(() => {
        const fetchPosts = async () => {
            try {
                const response = await axios.get('/api/posts');
                setPosts(response.data);
            } catch (error) {
                console.error('Error fetching posts:', error);
            }
        };
        fetchPosts();
    }, []);

    return (
        <div>
            <div>
                <PostForm />
            </div>
            <h2>Blog Posts</h2>
            <ul>
                {posts.map((post) => {
                    return (
                        <>
                            <li key={post.id}>{post.title} - {post.description} - {post.body}
                            </li>
                        </>
                    )})
                }
            </ul>
        </div>
    );
};

export default PostList;
