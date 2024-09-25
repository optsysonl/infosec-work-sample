import React from 'react';
import {Component} from 'react';
import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';
import HelloWorld from "./components/HelloWorld";
import Posts from "./components/Posts";

export default class App extends Component {
    render() {
        return (
            <Router>
                <Switch>
                    <Route exact path='/' render={ () => <HelloWorld />}/>
                    <Route exact path='/posts' render={ () => <Posts />}/>
                </Switch>
            </Router>
        );
    }
}
