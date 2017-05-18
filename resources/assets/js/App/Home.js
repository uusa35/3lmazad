/**
 * Created by usamaahmed on 5/17/17.
 */
import React , { Component } from 'react';
import { render } from 'react-dom';
import { Provider } from 'react-redux';
import * as actions from './redux/actions'
import configureStore from './redux/store';
import { initialState } from './Constants';
import SearchForm from '../App/components/SearchForm';
import { Link } from 'react-router'
import CommercialCreate from '../App/pages/CommercialCreate';
import Header from '../App/components/partials/Header'


let store = configureStore(initialState);
export default class Home extends Component {
    constructor(props) {
        super(props);
    }

    componentWillMount() {

    }

    render() {
        console.log(this.props);
        return (
            <Provider store={store}>
                <SearchForm />
            </Provider>
        );
    }
}