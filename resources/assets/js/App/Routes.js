/**
 * Created by usamaahmed on 5/17/17.
 */


import React , { Component } from 'react';
import { render } from 'react-dom';
import { Router , Route  } from 'react-router';
//import Root from './Root';
import Contact from '../App/pages/Contact';
import SearchForm from '../App/components/SearchForm';
import Home from './Home';
import About from '../App/pages/About';
import CommercialCreate from './../App/pages/CommercialCreate';
import Header from '../App/components/partials/Header';
import createBrowserHistory from 'history/createBrowserHistory'


const history = createBrowserHistory()

export default class Routes extends Component {

    constructor(props, content) {
        super(props, content);
    }


    render() {
        return (
            <Router history={history}>
                <div>
                    <Route exact path="/" component={Home}/>
                    <Route path="/search" component={SearchForm}/>
                    <Route path="/contact" component={Contact}/>
                    <Route path="/about" component={About}/>
                    <Route path="/commercial/create" component={CommercialCreate}/>
                </div>
            </Router>
        );
    }
}




