import React from 'react';
import {Component} from 'react';
import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';
import HelloWorld from "./components/HelloWorld";

export default class App extends Component {
    render() {
        return (
            <Router>
                <Switch>
                    <Route exact path='/' render={ () => <HelloWorld />}/>
                </Switch>
            </Router>
        );
    }
}
