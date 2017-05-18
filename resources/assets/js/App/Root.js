/**
 * Created by usamaahmed on 5/17/17.
 */
import React , { Component } from 'react';
import { Route } from 'react-router';
import Loader from 'react-loader';
import langs  from './locale/langs';
import Header from './components/partials/Header';
import SearchForm from './components/SearchForm';
import Contact from './pages/Contact';
import About from  './pages/About';
import CommercialCreate from './pages/CommercialCreate';


export default class Root extends Component {

    constructor(props, content) {
        super(props, content);
        this.state = {lang: 'ar', langs: langs, loaded: true}
    }

    changeLocal(locale = 'en') {
        this.state.langs.setLanguage(locale);
        this.setState({langs: langs});
    }

    render() {
        const { langs } = this.state;
        console.log(this.props);
        return (
            <div>
                <Header/>
            </div>
        );
    }
}


//<button onClick={() => this.changeLocal('ar')}>change to arabic</button>
//<button onClick={() => this.changeLocal('en')}>change to english</button>
//<Link to="contact">contact</Link>
//    <Link to="home">home</Link>
//    <Link to="/commercial/create">create commercial</Link>
//<h1>{langs.header}</h1>


