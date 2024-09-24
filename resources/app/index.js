import React from 'react';
import {render} from 'react-dom';
import App from './App';

const appRoot = document.getElementById('app');
if (appRoot) {
    render(<App/>, appRoot);
}
