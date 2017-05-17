/**
 * Created by usamaahmed on 5/17/17.
 */
import React , { Component } from 'react';
import SearchForm from '../App/components/SearchForm';
import { Link } from 'react-router'
import CommercialCreate from '../App/pages/CommercialCreate';

export default class Home extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <SearchForm />
        );
    }
}